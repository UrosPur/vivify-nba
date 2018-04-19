<?php

namespace App\Http\Controllers;

use App\Mail\UserRegistration;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Mail;

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

        $confirmation_code = str_random(30);

        $user = new User();

        $user->name =request('name');
        $user->email = request('email');
        $user->password = bcrypt(request('password'));
        $user->confirmation_code = $confirmation_code;



        $user->save();

        Mail::send('user.registration', ['confirmation_code' => $confirmation_code], function($message) {
            $message->to(request('email'))
                ->subject('Verify your email address');
        });

//        Mail::send('emails.reminder', ['user' => $user], function ($m) use ($user) {
//            $m->from('hello@app.com', 'Your Application');
//
//            $m->to($user->email, $user->name)->subject('Your Reminder!');
//        });

//        Mail::to(request('email'))->send(new UserRegistration());

        return redirect()->route('login')->with('status', 'Verify yur email !');

    }


    public function confirm($confirmation_code)
    {
//        if( ! $confirmation_code)
//        {
//            throw new InvalidConfirmationCodeException;
//        }

        $user = User::where('confirmation_code',$confirmation_code)->first();

        if ( ! $user)
        {
            return redirect()->route('teams.index')->with('status', 'Wrong code');
        }

        $user->is_verified = true;
        $user->confirmation_code = null;
        $user->save();

//        Flash::message('You have successfully verified your account.');

        auth()->login($user);

        return redirect()->route('teams.index')->with('status', 'Successfully logged in');
    }

}
