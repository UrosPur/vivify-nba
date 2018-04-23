<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class NewsController extends Controller
{
    public function index()
    {

        $news = News::with('user')->paginate(15);


        return view('news.index',compact('news'));

   }

    public function show($id)
    {

        $item = News::with('user')->find($id);


        return view('news.show', compact('item'));


   }
}
