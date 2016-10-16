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
            ['status', '=', 'Pending']])->orderBy('id')->get();

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
                        $session->weekday,
                        $session->start_time,
                        $movie->title,
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
        //TEST -- Parsing to int
        $adult = (int) $request->adult;
        $child = (int) $request->child;
        $concession = (int) $request->concession;
        $senior = (int) $request->senior;

        if ($adult != null ||$adult != 0)
        {
            Tickets::create(["type" => "Adult", "qty" => $adult, "booking_id" => $request->booking_id]);
        }
        if ($child  != null || $child  != 0)
        {
            Tickets::create(["type" => "Child", "qty" => $child, "booking_id" => $request->booking_id]);
        }
        if ($concession != null || $concession != 0)
        {
            Tickets::create(["type" => "Concession", "qty" => $concession, "booking_id" => $request->booking_id]);
        }
        if ($senior != null || $senior != 0 )
        {
            Tickets::create(["type" => "Senior", "qty" => $senior, "booking_id" => $request->booking_id]);
        }

        return redirect()->route('booking_tickets.index') ->with('success', 'Ticket/s added to cart successfully');
    }

    public function edit($id)
    {
        $ticket= Tickets::find($id);
        return view('Bookings.edit',compact('ticket'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "adult",
            "child",
            "concession",
            "senior",
            "booking_id" => 'required'
        ]);

        // Delete previous ticket id and jus create a new one
        Tickets::find($id)->delete();
        
        $adult = (int) $request->adult;
        $child = (int) $request->child;
        $concession = (int) $request->concession;
        $senior = (int) $request->senior;

        if ($adult != null ||$adult != 0)
        {
            Tickets::create(["type" => "Adult", "qty" => $adult, "booking_id" => $request->booking_id]);
        }
        if ($child  != null || $child  != 0)
        {
            Tickets::create(["type" => "Child", "qty" => $child, "booking_id" => $request->booking_id]);
        }
        if ($concession != null || $concession != 0)
        {
            Tickets::create(["type" => "Concession", "qty" => $concession, "booking_id" => $request->booking_id]);
        }
        if ($senior != null || $senior != 0 )
        {
            Tickets::create(["type" => "Senior", "qty" => $senior, "booking_id" => $request->booking_id]);
        }

        return redirect()->route('booking_tickets.index') ->with('success', 'Ticket/s added to cart successfully');
    }

    public function destroy($id)
    {
        Tickets::find($id)->delete();

        return redirect()->route('booking_tickets.index') ->with('success','Session deleted successfully');
    }

}
