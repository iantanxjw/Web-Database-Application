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
        $this->validate($request, [
            'name' => required,
            'email' => required,
            'password' =>required,
        ]);
        User::find($id)->update($request->all());
        return redirect()->route('admin_users.index')->with('success', 'User updated successfully');
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
