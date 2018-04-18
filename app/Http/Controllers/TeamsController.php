<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;


class TeamsController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth');

    }

    public function index()
    {
        $teams = Team::with('comment')->get();


        return view('teams.index',compact('teams'));
    }

    public function show($id)
    {
        $team = Team::with('player')->find($id);

//        dd($team);

        return view('teams.show',compact('team'));
    }
}
