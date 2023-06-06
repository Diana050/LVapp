<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    //
    public function index(){
        return view('comments.index');
    }

    public function show(Comment $comment){
        $comments = Comment::where('news_id', $comment->id)->get();
        return view('news.show', [
            //'new' => $new,
            'comments' => $comments
        ]);
    }
}
