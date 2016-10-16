<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Session;

class SessionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $sessions = Session::all()->sortBy('id');

        return view('admin.sessions', compact('sessions'));
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
            "start_time" => 'required',
            "duration" => 'required',
            "num_bookings" => 'required',
            "weekday" => 'required',
            "mv_id" => 'required',
            "t_id" => 'required',
        ]);
        Session::create($request->all());

        return redirect()->route('admin_sessions.index')->with('success','Session created successfully');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "start_time" => 'required',
            "duration" => 'required',
            "num_bookings" => 'required',
            "weekday" => 'required',
            "mv_id" => 'required',
            "t_id" => 'required',
        ]);
        Session::find($id)->update($request->all());
        return redirect()->route('admin_sessions.index') ->with('success','Session updated successfully');
    }

    public function destroy($id)
    {
        Session::find($id)->delete();
        return redirect()->route('admin_sessions.index') ->with('success','Session deleted successfully');
    }

    public function edit($id)
    {
        $sessions = Session::find($id);
        return json_encode($sessions);
    }

}
