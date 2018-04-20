<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Support\Facades\Mail;
use App\Mail\CommentsReceived;

class CommentsController extends Controller
{
    public function store($id)
    {

        $team = Team::find($id);

        $this->validate(request(), [

            'content' => 'required|min:15'
        ]);


            if (str_contains(request('content'), ['hate', 'idiot','stupid'])) {

                return view('forbidden-comment')->with('status', 'Message');
            }else{

                $comment = new Comment();

                $comment->content = request('content');
                $comment->team_id = $id;
                $comment->user_id = auth()->user()->id;

                $comment->save();

                Mail::to($team->email)->send(new CommentsReceived($team));


                return redirect()->back();

            };




    }
}
