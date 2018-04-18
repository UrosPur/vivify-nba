<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegisterController extends Controller
{

    public function __construct()
    {

        $this->middleware('guest');
    }

    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        $this->validate(request(),[

            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',

        ]);

        $user = new User();

        $user->name =request('name');
        $user->email = request('email');
        $user->password = bcrypt(request('password'));

        $user->save();

        return redirect()->route('teams.index')->with('status', 'Registration successful !');

    }
}
