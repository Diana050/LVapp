<x-layout>
    @include('partials._hero')
    @include('partials._serch')

    @if(count($news)==0)
        <x-card class="w-full">
            <p class="py-8  text-center text-lg">No news found</p>
        </x-card>

    @endif
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

        @foreach($news as $new)
            <x-news-card :new="$new"/>
        @endforeach
    </div>
    <div class="mt-6 p-4">
        {{$news->links()}}
    </div>
    </body>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/botman-web-wiget@0/build/assets/css/chat.min.css">
    <script>
        var botmanWidget ={
            aboutText: 'Read & Share',
            introMessage: "Hi! My name is Toby and I am your personal assistant. Feel free to ask me any questions about Read & Share App functionalities, or you can ask me for some book recommendations based on genre. "
        };
    </script>
    <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
</x-layout>

