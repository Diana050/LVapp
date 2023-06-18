@component('mail::message')
    <p>Dear {{ $book->user->UserName }},</p>

    <p>
        User {{ $user->UserName }} has requested the book "{{ $book->title }}" from you.
        Please consider their request and provide any necessary instructions for further steps.
    </p>

    <p>Book Details:</p>

    <ul>
        <li>Title: {{ $book->title }}</li>
        <li>Author: {{ $book->author }}</li>
        <li>Publishing House: {{ $book->publishing_house }}</li>
        <li>Number of Pages: {{ $book->nOfPage }}</li>
    </ul>

    <p>Thank you for your attention.</p>

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
