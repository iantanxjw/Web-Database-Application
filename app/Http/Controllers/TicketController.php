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
        $bookings = Booking::where([
            ['user_id','=',\Auth::user()->id ],
            ['status', '=', 'Pending']
        ])->get();

        $tickets= [];

        //For each booking with the user id
        foreach ($bookings as $booking)
        {
            $session =  Session::find($booking->sess_id);
            $movie = Movies::find($session->mv_id);
            $ticket = Tickets::where('booking_id', $booking->id)->get();

            //Checking if booking has an tickets
            if (count($ticket) == 0)
            {
                Booking::destroy($booking->id);

            }
            else{
                //check if there are tickets available else delete booking
                //iterate over all the tickets and store it into a ticket Object

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
        }
        return view('Bookings.form', compact('tickets'));
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

        if ($request->adult != null || $request->adult != 0)
        {
            Tickets::create(["type" => "Adult", "qty" => $request->adult, "booking_id" => $request->booking_id]);
        }
        if ($request->child != null || $request->child != 0)
        {
            Tickets::create(["type" => "Child", "qty" => $request->child, "booking_id" => $request->booking_id]);
        }
        if ($request->concession != null || $request->concession != 0)
        {
            Tickets::create(["type" => "Concession", "qty" => $request->concession, "booking_id" => $request->booking_id]);
        }
        if ($request->senior != null || $request->senior != 0)
        {
            Tickets::create(["type" => "Senior", "qty" => $request->senior, "booking_id" => $request->booking_id]);
        }

        return redirect()->route('booking_tickets.index') ->with('success', 'Ticket/s added to cart successfully');
    }

    public function destroy($id)
    {
        Ticket::find($id)->delete();

        return redirect()->route('Bookings.form') ->with('success','Session deleted successfully');
    }

}
