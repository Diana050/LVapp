<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    //
//public function index()
//{
//    $comments = Comment::all(); // Assuming you want to retrieve all comments
//    return view('comments.index', [
//        'comments' => $comments
//    ]);
//}

    public function index(Request $request)
    {

        $newsId = $request->query('news_id');
        $comments = Comment::where('news_id', $newsId)->orderBy('created_at', 'desc')->paginate(30);

        return view('comments.index', [
            'newsId' => $newsId,
            'comments' => $comments
        ]);
    }

    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'user_id' => 'required|integer',
            'news_id' => 'required|integer',
            'comment' => 'required|string|max:255',
        ]);

        // Create a new comment instance and fill it with the validated data
        $comment = new Comment();
        $comment->fill($validatedData);

        // Save the comment in the database
        $comment->save();

        // Redirect back to the same page with success message
        return back()->with('success', 'Comment posted successfully!');
    }


}
