

<x-layout>
    @include('partials._heroBooks')
    @include('partials._serch')
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

        @if(count($books)==0)
            <p>No books found</p>
        @endif
        @foreach($books as $book)

            <x-books-card :book="$book"/>
        @endforeach
    </div>
    <div class="mt-6 p-4">
        {{$books->links()}}
    </div>

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/botman-web-wiget@0/build/assets/css/chat.min.css">
    <script>
        var botmanWidget ={
            aboutText: 'Read & Share',
            introMessage: "Hi! My name is Toby and I am your personal assistant. Feel free to ask me any questions about Read & Share App functionalities, or you can ask me for some book recommendations based on genre."
        };
    </script>
    <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
</x-layout>

