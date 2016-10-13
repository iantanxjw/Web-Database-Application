<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

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

            return view("test",compact('user'))->with(["poop"=>"this is from user page"]);
        }
        else
        {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);

            $user->save();

            return view("test_request")->with(["poop"=>"from admin page"]);
            //return view("test_request")->with(["header" => $request->path()]);
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
