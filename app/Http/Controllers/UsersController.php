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
        $users = User::find($id);
        return view('admin.forms.theatre_edit', compact('users'));
    }
}
