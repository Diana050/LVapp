<?php

namespace App\Http\Controllers;

use App\Models\Reviews;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    //

    public function index(Request $request)
    {

        $booksId = $request->query('books_id');
        $reviews = Reviews::where('books_id', $booksId)->orderBy('created_at', 'desc')->paginate(30);

        return view('reviews.index', [
            'booksId' => $booksId,
            'reviews' => $reviews
        ]);
    }

    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'user_id' => 'required|integer',
            'books_id' => 'required|integer',
            'review' => 'required|string|max:255',
        ]);

        // Create a new comment instance and fill it with the validated data
        $review= new Reviews();
        $review->fill($validatedData);

        // Save the comment in the database
        $review->save();

        // Redirect back to the same page with success message
        return back()->with('success', 'Comment posted successfully!');
    }
}
