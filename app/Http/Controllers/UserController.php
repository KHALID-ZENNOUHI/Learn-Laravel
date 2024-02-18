<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;         

class UserController extends Controller
{
    public function show()
    {
        $roles = Role::all();
        $users = User::all();
        return view('admin.users', compact('roles', 'users'));
    }

    public function add(Request $request)
    {
        //request validation
        $attribute = $request->validate([
            'name' => ['required', 'min:6', 'max:50'],
            'email' => ['required', 'email', 'max:255','unique:users'],
            'password' => ['required', 'min:8', 'max:25'],
            'role_id' => ['required', 'numeric', 'max:3']
        ]);
        //hach the password
        $attribute['password'] = bcrypt($attribute['password']);

        //add to the attributes to the database
        User::create($attribute);
        return redirect('/users')->with('success', 'Your user has been added successfully');
    }

    public function update(Request $request)
    {
        $attribute = $request->validate([
            'name' => ['required', 'min:6', 'max:50'],
            'email' => ['required', 'email', 'max:255',Rule::unique('users')->ignore($request->id)],
            'role_id' => ['required', 'numeric', 'max:3']
        ]);
        $user = User::findOrFail($request->id);
        $user->update($attribute);
        return back()->with('success', 'the information of the account updated successfully');
    }

    public function delete(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->delete();
        return back()->with('success', 'the information of the account updated successfully');
    }
}
