<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Tickets;
use App\Ticket;
use App\Booking;
use App\Session;
use App\Movies;

class TicketController extends Controller
{
    public function index(Request $request)
    {
        $bookings = Booking::where('user_id', \Auth::user()->id )->orderBy('id');

        $tickets= [];

        foreach ($bookings as $booking)
        {
            $session =  Session::find($booking->sess_id);
            $movie = Movies::find($session->mv_id);
            $ticket = Tickets::where('booking_id', $booking->id);
            foreach ($ticket as $ticket_types) {
                $tickets[] = new Ticket(
                    $ticket_types->id,
                    $movie->title,
                    $session->weekday,
                    $session->start_time,
                    $ticket_types->type,
                    $ticket_types->qty,
                    $ticket_types->booking_id
                );
            }
        }

        return view('form', compact('tickets'));
    }



    public function store(Request $request)
    {
        $this->validate($request, [
            "adult",
            "child",
            "concession",
            "senior",
            "booking_id" => 'required'
        ]);

        if ($request->adult != null || $request->adult != "")
        {
            Tickets::create(["type" => "Adult", "qty" => $request->adult, "booking_id" => $request->booking_id]);
        }
        if ($request->child != null || $request->child != "")
        {
            Tickets::create(["type" => "Child", "qty" => $request->adult, "booking_id" => $request->booking_id]);
        }
        if ($request->concession != null || $request->concession != "")
        {
            Tickets::create(["type" => "Concession", "qty" => $request->adult, "booking_id" => $request->booking_id]);
        }
        if ($request->senior != null || $request->senior != "")
        {
            Tickets::create(["type" => "Senior", "qty" => $request->adult, "booking_id" => $request->booking_id]);
        }

        return redirect()->route('admin_tickets.index') ->with('success', 'Ticket created successfully');
    }
}
