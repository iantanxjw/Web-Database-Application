<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wishlist;
use App\User;
use App\Http\Requests;

global $globals;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $wishlists = Wishlist::where('u_id', \Auth::user()->id )
            ->orderBy('id','DESC')
            ->paginate(20);

        return view('WishlistCRUD.index',compact('wishlists')) ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "mv_name" => "required",
            "u_id" => "required"
        ]);


        $check = Wishlist::where('u_id', \Auth::user()->id)
            -> where('mv_name', $request->mv_name );
        // check if
        if ($check->count() == 1){
            return redirect()->route('index') ->with('errors',$request->mv_name.' already exists in your wishlist!');
        }
        else {
            Wishlist::create($request->all());
            return redirect()->route('index') ->with('success',$request->mv_name.' added successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Wishlist::find($id)->delete();
        return redirect()->route('WishlistCRUD.index') ->with('success','Item deleted successfully');
    }
}
