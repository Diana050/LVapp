@props(['book'])

<div class="mx-4">
    <x-card>
        <div class="flex flex-col items-center justify-center text-center">
            <img class="w-48 mr-6 mb-6" src="{{$book->cover ? asset('storage/' . $book->cover) : asset('/images/no-image.png')}}" alt=""/>

            <h3 class="text-2xl mb-2">{{$book->title}}</h3>
            <x-books-tag :tagsCsv="$book->tags"/>
            <div class="text-lg my-4">
                <i class="fa-solid fa-person"></i> {{$book->author}}
            </div>
            <div class="text-lg my-4">
                <i class="fa-solid fa-book-open"></i> {{$book->nOfPage}}
            </div>
            <div class="text-lg my-4">
                <i class="fa-solid fa-building"></i> {{$book->publishing_house}}
            </div>
            <div class="text-lg my-4">
                <i class="fa-solid fa-user"></i> {{$book->user->UserName}}
            </div>
            <div class="border border-gray-200 w-full mb-6"></div>
            <div>
                <h3 class="text-3xl font-bold mb-4">
                    Description
                </h3>
                <div class="text-lg space-y-6">
                    <p>
                        {{$book->description}}
                    </p>

{{--                    <a href="mailto:{{$new->contact}}" class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80">--}}
{{--                        <i class="fa-solid fa-envelope"></i> Contact Employer</a>--}}

                </div>
            </div>
        </div>
    </x-card>
        <x-card class="mt-4 p-2 flex space-x-6">
            <a href="/books/{{$book->id}}/edit">
                <i class="fa-solid fa-pencil"></i> Edit
            </a>

            <form method="POST" action="/books/{{$book->id}}">
                @csrf
                @method('DELETE')
                <button class="text-red-600">
                    <i class="fa-solid fa-trash"></i>Delete
                </button>
            </form>
        </x-card>
</div>
