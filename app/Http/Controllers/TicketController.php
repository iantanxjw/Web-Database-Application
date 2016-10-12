<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\ticket;

class TicketController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            "type" => 'required',
            "qty" => 'required',
            "booking_id" => 'required'
        ]);

        ticket::create($request->all());


        $session = Session::find($request->sess_id);
        $movie = Movies::find($session->mv_id);

        return view('bookings', compact('session', 'movie'));
    }
}
