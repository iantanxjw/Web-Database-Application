<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use App\Booking;
use App\Tickets;
use App\Ticket;
use App\Session;
use App\Movies;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        /*generating id  ? */
        /*validation duplicate keys */
        $users = User::orderBy('id','DESC')->paginate(5);
        return view('admin.users',compact('users'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "name" => "required",
            "email" => "required",
            "password" => "required"
        ]);

        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt($request->password),
            "admin" => $request->admin
        ]);

        return redirect()->route("admin_users.index")->with("success", $request->name . " created successfully");
    }

    public function update(Request $request, $id)
    {

        // $this->validate($request, [
        //     'name' => "required",
        //     'email' => "required",
        //     'password' => "required",
        // ]);

        $user = User::find($id);


        // save only runs if things have changed
        //$user->save();
        if ($request->source == 0) {

            $user->admin = $request->admin;
            $user->address = $request->address;
            $user->suburb = $request->suburb;
            $user->postcode = $request->pcode;

            $user->save();

            $bookings = Booking::where([
                ['user_id','=',\Auth::user()->id ],
                ['status', '=', 'Pending']
            ])->get();

            $tickets= [];
            //For each booking with the user id
            foreach ($bookings as $booking) {
                $session = Session::find($booking->sess_id);
                $movie = Movies::find($session->mv_id);
                $ticket = Tickets::where('booking_id', $booking->id)->get();

                //Checking if booking has an tickets
                if (count($ticket) == 0) {
                    Booking::destroy($booking->id);

                } else {
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
                    if ($booking->status == "Pending") {
                        $booking->status = "Success";
                        $booking->save();
                    }
                }
            }

            return view("test",compact('user','tickets'));//->with(["testing"=>"this is from user page"]);
        }
        else
        {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);

            $user->save();

            //return view("test",compact('user'));//->with(["testing"=>"from admin page"]);
            return view("test_request")->with(["header" => $request->path()]);
        }
        //return redirect()->route('admin_users.index')->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('admin_users.index')->with('success', 'User deleted successfully');
    }

    public function edit($id)
    {
        $user = User::find($id);
        
        return json_encode($user);
    }
}
