<?php

namespace App\Mail;

use App\Models\Books;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BookRequest extends Mailable
{
    use Queueable, SerializesModels;


    public $book;
    public $user;

    /**
     * Create a new message instance.
     *
     * @param  \App\Models\Books  $book
     * @param  \App\Models\User  $user
     * @return void
     */
    public function __construct(Books $book, User $user)
    {
        $this->book = $book;
        $this->user = $user;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.book_request')
            ->subject('Book Request')
            ->with([
                'book' => $this->book,
                'user' => $this->user,
            ]);
    }





}
