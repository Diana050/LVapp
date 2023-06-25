@props(['book'])


<x-layout>

    <div
        class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24"
    >
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Edit: {{$book->title}}
            </h2>
            <p class="mb-4"></p>
        </header>

        <form method="POST" action="/books/{{$book->id}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="title" class="inline-block text-lg mb-2">Book Title</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title"
                    placeholder="Example:Jane Eyre" value="{{$book->title}}"/>
                @error('title')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="author" class="inline-block text-lg mb-2">Book Author</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="author"
                    placeholder="Example: Charlotte Bronte" value="{{$book->author}}"/>
                @error('author')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="publishing_house" class="inline-block text-lg mb-2">Publishing House</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="publishing_house" value="{{$book->publishing_house}}"/>
                @error('publishing_house')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="edition" class="inline-block text-lg mb-2">Edition</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="edition" placeholder="Example: 2009" value="{{$book->edition}}"/>
                @error('edition')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="languages" class="inline-block text-lg mb-2">Language</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="languages" value="{{$book->languages}}"/>
                @error('languages')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="nOfPage" class="inline-block text-lg mb-2">No Of PAges</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="nOfPage" value="{{$book->nOfPage}}"/>
                @error('nOfPage')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="tags" class="inline-block text-lg mb-2">Tags (Comma Separated)</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="tags"
                    placeholder="Example: Romance, Novel, Fictional, etc" value="{{$book->tags}}"/>
                @error('tags')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="cover" class="inline-block text-lg mb-2">
                    Book cover</label>
                <input type="file" class="border border-gray-200 rounded p-2 w-full" name="cover" value="{{$book->cover}}"/>
                {{--            @error('logo')--}}
                {{--            <p class="text-red-500 text-xs mt-1">{{$message}}</p>--}}
                {{--            @enderror--}}
            </div>

            <div class="mb-6">
                <label for="description" class="inline-block text-lg mb-2">Book Description</label>
                <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10">{{$book->description}}</textarea>
                @error('description')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Edit Book
                </button>

                <a href="/books" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </div>
</x-layout>
