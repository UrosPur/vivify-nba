<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;


class TeamsController extends Controller
{
    public function index()
    {
        $teams = Team::all();

//        dd($teams);

        return view('teams.index',compact('teams'));
    }

    public function show($id)
    {
        $team = Team::with('player')->find($id);

//        dd($team);

        return view('teams.show',compact('team'));
    }
}
