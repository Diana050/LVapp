<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;

class ChatBotController extends Controller
{
    //
    public function index(){

        $botman = app('botman');
        $botman->fallback(function($bot){
            $message = $bot->getMessage();
            $bot->reply('Sorry, I do not understand what you want to say, please try to ask a different question.');
        });
        $botman->hears('Hi|Hello|Hey.*', function ($bot){
            $bot->reply('Hello! How can I assist you today?');
        });
        $botman->hears('.*calendar|talk|program|agenda.*', function ($bot){
            $bot->reply('If you are an already register user in the Book Talk Program you can find the agenda for all the existent meetings');
            $bot->reply('You can also create a meeting and place it in the calendar');
        });
        $botman->hears('.*join|reservation|appointment|register.*', function ($bot){
            $bot->reply('You can join directly from the link provided by the person who created the meeting');
            $bot->reply('You do not need any registration before joining a meeting ');
        });
        $botman->hears('.*news|topic|topic|forum.*', function ($bot){
            $bot->reply('In the news page you can find a list of news and topics posted by our community. You can join them by adding comments at their posts or by starting a new topic ');
        });
        $botman->hears('.*books.*', function ($bot){
            $bot->reply('In the books page you can find all the books that are ready to be lend or sail by our community. Every book has its own page where you can find more details and a form ready for you to request the book ');
        });
        $botman->hears('.*request|obtain|borrow|buy|lent.*', function ($bot){
            $bot->reply('You can find the request a book form in the book details page and after completing the form you request will be successfully created.');
        });
        $botman->hears('.*read|share|app|application|about.*', function ($bot){
            $bot->reply('The Read & Share app is designed for book enthusiasts, here you can search for new books by buying or borrowing them directly from their owner or post your own books that you are willing to borrow or sell');
            $bot->reply('You can join the community of readers and participate in online meetings with different themes or even initiate your own meeting.');
            $bot->reply('You can contribute to discussions on various topics or start a new one.');
        });

        $botman->hears('.*victorian|gothic|fiction|science fiction|romance|science|novel|mystery|fantasy|literary|historical|history|no-fiction|horror|young adult|drama|humor|contemporary|essay|travel|autobiography|spirituality|poetry|adventure|paranormal romance|satire|educational|kids|personal development|educational.*', function ($bot) {
            $tag = $bot->getMessage()->getText(); // Get the tag mentioned in the user's message
            $titles = Books::where('tags', 'like', "%$tag%")->pluck('title')->toArray();

            if (!empty($titles)) {
                $randomTitle = $titles[array_rand($titles)];
                $bot->reply("Here's a book with the specified tag: $randomTitle");
            } else {
                $bot->reply("Sorry, there are no books with the specified tag.");
            }
        });



        $botman->listen();
    }
}
