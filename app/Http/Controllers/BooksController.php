<?php

namespace App\Http\Controllers;
use App\Mail\BookRequest;
use App\Models\Books;
use App\Models\BookUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class BooksController extends Controller
{
    //
    public function index(){
        return view('books.index', [
            'books' => Books::latest()->filter(request(['tag' , 'search']))->paginate(6)
        ]);

    }

    public function show(Books $book){
        return view('books.show', [
            'book' => $book
        ]);
    }

    public function request(Request $request, Books $book)
    {
        // Store the user ID and book ID in the book_user table
//        $book->user()->associate(auth()->user());
        BookUser::create([
            'user_id' => auth()->id(),
            'book_id' => $book->id
        ]);

        // Redirect back or to a specific page
        return redirect()->back()->with('message', 'Book requested successfully!');
    }

    public function create(){
        return view('books.create');
    }

    //store news data
    public function  store(Request $request){

        $formFields = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'languages' => 'required',
            'tags' => 'required',
            'description' => 'required',
            'publishing_house' => 'required',
            'nOfPage' => 'required',

        ]);
        if($request->hasFile('cover'))
        {
            $formFields['cover'] = $request->file('cover')->store('covers', 'public');
        }

        $formFields['user_id'] =  auth()->id();

        Books::create($formFields);
        return redirect('/books')->with('message' , 'Book registered successfully!');
    }

    public function edit(Books $book){
        return view('books.edit', ['book' => $book]);
    }

    //update data
    public function update(Request $request, Books $book){

        //make sure the logged in user is the owner
        if($book->user_id != auth()->id()){
            abort(403,'Unauthorized Action!');
        }

        $formFields = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'languages' => 'required',
            'tags' => 'required',
            'description' => 'required',
            'publishing_house' => 'required',
            'nOfPage' => 'required',

        ]);
        if($request->hasFile('cover'))
        {
            $formFields['cover'] = $request->file('cover')->store('covers', 'public');
        }

        $book->update($formFields);
        return redirect('/books')->with('message' , 'Announcement updated successfully!');
    }

    //Delete

    public function destroy(Books $book){

        //make sure the logged in user is the owner
        if($book->user_id != auth()->id()){
            abort(403,'Unauthorized Action!');
        }

        $book->delete();
        return redirect('/books')->with('message' , 'Announcement deleted successfully!');
    }

    //manage news
    public function manage(){
        return view('books.manage', ['books'=>auth()->user()->books()->get()]);
    }


}
