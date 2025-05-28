<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use App\Models\Tool;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create ()
    {        
        return view('login');
    }

    public function index ()
    {
        $stats = [
            [
                'icon' => 'users',
                'title' => 'Users',
                'total' => User::all()->count(),
                'increase' => '0'
            ],
            [
                'icon' => 'wrench',
                'title' => 'Tools',
                'total' => Tool::all()->count(),
                'increase' => '0'
            ],
            [
                'icon' => 'layers',
                'title' => 'Categories',
                'total' => Category::all()->count(),
                'increase' => '0'
            ],
            [
                'icon' => 'tags',
                'title' => 'Tags',
                'total' => Tag::all()->count(),
                'increase' => '0'
            ]
        ];

        $stats = collect($stats)->map(fn($stat) => (object) $stat);

        return view('admin.dashboard', ['stats' => $stats]);
    }

    public function store (Request $request)
    {
        $validation = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        
        if (! Auth::attempt($validation)) {
            throw ValidationException::withMessages([
                'email' => 'Your email or password is incorrect.'
            ]);
        }

        request()->session()->regenerate();

        return redirect('/admin');
    }

    public function destroy ()
    {
        Auth::logout();

        return redirect('/');     
    }

    public function show ()
    {
        $user = Auth::user();

        return view('admin.profile', ['user' => $user]);
    }

    public function update (Request $request)
    {
        $validation = $request->validate([
            'name' => ['required', 'min:6'],
            'email' => ['required', 'email', Rule::unique('users')->ignore(Auth::user()->id)],
        ]);

        $user = Auth::user();

        $user->update([
            'name' => $validation['name'],
            'email' => $validation['email']
        ]);
    
        return redirect('/admin/profile')->with('flash', [
            'type' => 'success',
            'icon' => 'check-circle',
            'title' => 'Changes Saved',
            'message' => 'Your profile details have been updated successfully.'
        ]);        
    }
}
