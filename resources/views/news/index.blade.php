<x-layout>
    @include('partials._hero')
    @include('partials._serch')
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

        @if(count($news)==0)
            <p>No news found</p>
        @endif
        @foreach($news as $new)
            <x-news-card :new="$new"/>
        @endforeach
    </div>
    <div class="mt-6 p-4">
        {{$news->links()}}
    </div>
</x-layout>

