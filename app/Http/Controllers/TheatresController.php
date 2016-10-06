<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Theatre;

class TheatresController extends Controller
{
    public function index(Request $request)
    {
        /*generating id  ? */
        /*validation duplicate keys */
        $locations = Theatre::orderBy('id','DESC')->paginate(5);
        return view('admin.locations',compact('locations')) ->with('i', ($request->input('page', 1) - 1) * 5);
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
            "id"  => 'required',
            "location"  => 'required',
            "seats"  => 'required',
        ]);
        Theatre::create($request->all());
        return redirect()->route('admin_locations.index') ->with('success','Session created successfully');
    }

    public function create()
    {
        return view('admin.locations');
    }

    public function destroy($id)
    {
        Theatre::find($id)->delete();
        return redirect()->route('admin_locations.index') ->with('success','Theatre deleted successfully');
    }

    public function edit($id)
    {
        $theatre = Theatre::find($id);
        return view('admin.locations',compact('product'));
    }
}
