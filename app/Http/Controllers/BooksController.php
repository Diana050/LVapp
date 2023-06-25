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
        $editionsCount = Books::where('title', $book->title)->count('edition');

        return view('books.show', [
            'book' => $book,
            'editionsCount' => $editionsCount,
        ]);
    }

    public function request(Request $request, Books $book)
    {
        // Store the user ID and book ID in the book_user table

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
            'edition' => 'required',

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
            'edition' => 'required',

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

    public function topAuthors()
    {
        $topAuthors = Books::select('author', \DB::raw('COUNT(*) as total_books'))
            ->groupBy('author')
            ->orderByDesc('total_books')
            ->limit(5) // You can adjust the limit as per your preference
            ->get();

        return view('statistics.top-authors', ['topAuthors' => $topAuthors]);
    }

    public function bookCountByLanguage()
    {
        $bookCountByLanguage = \DB::table('books')
            ->select('languages', \DB::raw('COUNT(*) as count'))
            ->groupBy('languages')
            ->get();

        $languages = $bookCountByLanguage->pluck('languages');
        $counts = $bookCountByLanguage->pluck('count');

        return view('statistics.bookCountByLanguage', compact('languages', 'counts'));
    }

    public function mostRequested()
    {
        $mostRequested = BookUser::with('book')
            ->select('book_id', \DB::raw('count(*) as total'))
            ->groupBy('book_id')
            ->orderByDesc('total')
            ->limit(5) // Retrieve the top 5 most requested books
            ->get();

        return view('statistics.most-requested', [
            'mostRequested' => $mostRequested,
        ]);
    }
}
