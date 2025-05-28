<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index ()
    {
        $users = User::all();

        return view('admin.users.index', ['users' => $users]);
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            'name' => ['required', 'min:4'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:6']
        ]);

        User::create([
            'name' => $validation['name'],
            'email' => $validation['email'],
            'password' => $validation['password'],
            'authority' => $request->has('authority') ? 'admin' : 'staff'
        ]);

        return redirect('/admin/users')->with('flash', [
            'type' => 'success',
            'icon' => 'check-circle',
            'title' => 'User Created',
            'message' => 'The user has been created successfully.'
        ]);
    }

    public function show(User $user)
    {
        return view('admin.users.show', ['user' => $user]);
    }

    public function update (User $user, Request $request)
    {
        $validation = $request->validate([
            'name' => ['required', 'min:4'],
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($user->id)],
        ]);

        $user->update([
            'name' => $validation['name'],
            'email' => $validation['email'],
            'authority' => $request->has('authority') ? 'admin' : 'staff'
        ]);
    
        return redirect('/admin/users/'. $user->id)->with('flash', [
            'type' => 'success',
            'icon' => 'check-circle',
            'title' => 'Changes Saved',
            'message' => 'The user details have been updated successfully.'
        ]);
    }    

    public function destroy (User $user)
    {
        if ($user->id == Auth::user()->id) {
            return redirect('/admin/users/' . $user->id)->with('flash', [
                'type'    => 'error',
                'icon'    => 'alert-triangle',
                'title'   => 'Action Denied',
                'message' => 'You cannot delete your own account.',
            ]);
        }

        $user->delete();

        return redirect('/admin/users')->with('flash', [
            'type' => 'success',
            'icon' => 'trash-2',
            'title' => 'User Deleted',
            'message' => 'The user has been deleted successfully.'
        ]);
    }
}
