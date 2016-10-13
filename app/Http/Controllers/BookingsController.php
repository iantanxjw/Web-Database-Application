<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Booking;
use App\Movies;
use App\Session;
use App\Tickets;

class BookingsController extends Controller
{
    public function index(Request $request)
    {
        $bookings = Booking::where([
            ['user_id','=',\Auth::user()->id ],
            ['status', '=', 'success']
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
        return view('Bookings.index', compact('tickets'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "sess_id" => 'required',
            "user_id" => 'required',
            "status" => 'required'
        ]);

        $booking = Booking::create($request->all());
        $session = Session::find($request->sess_id);
        $movie = Movies::find($session->mv_id);

        return view('bookings', compact('session', 'movie', 'booking'));
    }

    public function destroy($id)
    {
        /* delete any rows with the foreign key $movieID BEFORE
            trying to delete the row in the parent table */
        foreach (Tickets::where("booking_id", $id)->get() as $ticket)
        {
            $ticket->delete();
        }

        if (Booking::find($id) != null)
        {
            Booking::find($id)->delete();
        }


        return redirect()->route('booking_tickets.index') ->with('success','Session deleted successfully');
    }
}
