<?php

use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\ManageController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ChatBotController;
use Illuminate\Support\Facades\Route;
use App\Models\news;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//bot
//Route::get('/', function (){
//    return view('botman-welcome');
//});

Route::match(['get','post'], '/botman', [ChatBotController::class, 'index']);
//Index
Route::get('/news', [NewsController::class, 'index']);

Route::get('/books', [BooksController::class, 'index']);

Route::get('/manage', [ManageController::class, 'index'])->middleware('auth');

Route::get('/userProfile', [UserController::class, 'index'])->middleware('auth');

Route::get('/comments' , [CommentsController::class, 'index'])->middleware('auth');

Route::get('/reviews' , [ReviewsController::class, 'index'])->middleware('auth');

Route::get('/calendar' , [CalendarController::class, 'index']);


//Show create form
Route::get('/news/create', [NewsController::class, 'create'])->middleware('auth');

Route::get('/books/create', [BooksController::class, 'create'])->middleware('auth');

//store  data
Route::post('/news', [NewsController::class, 'store'] )->middleware('auth');

Route::post('/books', [BooksController::class, 'store'] )->middleware('auth');

Route::post('/comments/store/{news_id}', [CommentsController::class, 'store'])->middleware('auth')->name('comments.store');

Route::post('/reviews/store/{books_id}', [ReviewsController::class, 'store'])->middleware('auth')->name('reviews.store');

Route::post('/books/{book}/request', [BooksController::class, 'request'])->name('books.request')->middleware('auth');

Route::post('/calendar', [CalendarController::class, 'store'] )->middleware('auth')->name('calendar.store');;


//show edit form
Route::get('/news/{new}/edit', [NewsController::class, 'edit'])->middleware('auth');

Route::get('/books/{book}/edit', [BooksController::class, 'edit'])->middleware('auth');


//Update
Route::put('/news/{new}', [NewsController::class, 'update'])->middleware('auth');

Route::put('/books/{book}', [BooksController::class, 'update'])->middleware('auth');

Route::patch('/calendar/update/{id}', [CalendarController::class, 'update'])->middleware('auth')->name('calendar.update');


//Delete
Route::delete('/news/{new}', [NewsController::class, 'destroy'])->middleware('auth');

Route::delete('/books/{book}', [BooksController::class, 'destroy'])->middleware('auth');

Route::delete('/calendar/destroy/{id}', [CalendarController::class, 'destroy'])->middleware('auth')->name('calendar.destroy');

//manage pages
Route::get('/news/manage', [NewsController::class, 'manage'])->middleware('auth');

Route::get('/books/manage', [BooksController::class, 'manage'])->middleware('auth');

//single page news and books
Route::get('/news/{new}', [NewsController::class, 'show'] );

Route::get('/books/{book}', [BooksController::class, 'show'] );


//Show User Register
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

//Create new Users
Route::post('/users', [UserController::class, 'store']);

//log out user
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

//show log in form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

//log in user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);



//    Route::get('/test-connection', function () {
//        try {
//            DB::connection()->getPdo();
//            return 'Database connection successful.';
//        } catch (\Exception $e) {
//            return 'Database connection failed: ' . $e->getMessage();
//        }
//    });

