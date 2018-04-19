<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentsController extends Controller
{
    public function store($id)
    {

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


                return redirect()->back();

            };




    }
}
