<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest',['except' => 'logout']);
    }

    public function create()
    {

        return view('login.login');

    }

    public function store()
    {

        if (!auth()->attempt(['email' => request('email'), 'password' => \request('password'),'is_verified' => 1]))  {

            return back()->withErrors([

                'message' => 'Check information and try again'

            ]);

        }


////        if(!isset(auth()->user()->is_verified)){
////            dd(200);
////        }else{
////            dd(250);
////        }
//
//
//        if(!isset(auth()->user()->is_verified)) {
//
//
//            dd(25000);
//            return back()->withErrors([
//
//               'message' => 'Please check your email to verify your account'
//
//            ]);
//
//        }


        return redirect()->route('teams.index')->with('status', 'Successfully logged in');


    }

    public function logout()
    {

        auth()->logout();

        return redirect()->route('login')->with('status', 'Logout successful');

    }
}
