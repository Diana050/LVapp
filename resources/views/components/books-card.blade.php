@props(['book'])

<x-card>
    <div class="flex">
        <img class="hidden w-48 mr-6 md:block" src="{{$book->cover ? asset('storage/' . $book->cover) : asset('/images/no-image.png')}}" alt=""/>
        <div>
            <h3 class="text-2xl">
                <a href="/books/{{$book->id}}">{{$book->title}}</a>
            </h3>
            <x-books-tag :tagsCsv="$book->tags"/>
            <div class="text-lg mt-4">
                <i class="fa-solid fa-person"></i> {{$book->author}}
            </div>
            <div class="text-lg mt-4">
                <i class="fa-solid fa-book-open"></i> {{$book->nOfPage}}
            </div>
            <div class="text-lg mt-4">
                <i class="fa-solid fa-building"></i> {{$book->publishing_house}}
            </div>
            <div class="text-lg mt-4">
                <i class="fa-solid fa-user"></i> {{$book->user->FirstName}}
            </div>
        </div>
    </div>
</x-card>
