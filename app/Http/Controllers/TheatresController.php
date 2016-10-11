<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Theatre;
use App\Session;

class TheatresController extends Controller
{
    public function index(Request $request)
    {
        /*generating id  ? */
        /*validation duplicate keys */
        $locations = Theatre::orderBy('id','DESC')->paginate(5);
        return view('admin.theatres',compact('locations')) ->with('i', ($request->input('page', 1) - 1) * 5);
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
            "theatre_num"  => 'required',
            "location"  => 'required',
            "seats"  => 'required',
        ]);
        Theatre::create($request->all());
        return redirect()->route('admin_theatres.index') ->with('success', 'Theatre created successfully');
    }

    public function edit($id)
    {
        // returning to an ajax call so encode json
        $theatre = Theatre::find($id);

        return json_encode($theatre);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "theatre_num"  => 'required',
            "location"  => 'required',
            "seats"  => 'required',
        ]);
        Theatre::find($id)->update($request->all());
        return redirect()->route('admin_theatres.index') ->with('success', 'Theatre updated successfully');
    }

    public function destroy($id)
    {
        // theatre id is a foreign key of session so kill the session first
        foreach (Session::where("t_id", $id)->get() as $session)
        {
            $session->delete();
        }

        Theatre::find($id)->delete();
        return redirect()->route('admin_theatres.index') ->with('success','Theatre deleted successfully');
    }
}
