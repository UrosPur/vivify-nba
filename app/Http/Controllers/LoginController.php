<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function create()
    {

        return view('login.login');

    }

    public function store()
    {

        if (!auth()->attempt(request(['email', 'password']))) {

            return back()->withErrors([

                'message' => 'Check information and try again'

            ]);

        }

        return redirect()->route('teams.index')->with('status', 'Successfully logged in');


    }

    public function logout()
    {

        auth()->logout();

        return redirect()->route('login')->with('status', 'Logout successful');

    }
}
