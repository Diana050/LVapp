<x-layout>

    <div
        class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24"
    >
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Register a book
            </h2>
            <p class="mb-4">Post a book you are willing to lend </p>
        </header>

        <form method="POST" action="/books" enctype="multipart/form-data">
            @csrf

            <div class="mb-6">
                <label for="title" class="inline-block text-lg mb-2"
                >Book Title</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title"
                    placeholder="Example: Jane Eyre" value="{{old('title')}}"/>
                @error('title')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="author" class="inline-block text-lg mb-2">
                    Author</label
                >
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="author"
                    placeholder="Example: Charlotte Bronte" value="{{old('author')}}"/>
                @error('author')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="publishing_house" class="inline-block text-lg mb-2">Publishing house</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="publishing_house" value="{{old('publishing_house')}}"/>
                @error('publishing_house')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="languages" class="inline-block text-lg mb-2">Language</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full"
                    name="languages" value="{{old('languages')}}"/>
                @error('languages')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="nOfPage" class="inline-block text-lg mb-2">No. of Pages</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full"
                       name="nOfPage" value="{{old('nOfpage')}}"/>
                @error('nOfPage')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="tags" class="inline-block text-lg mb-2">
                    Tags (Comma Separated)
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="tags"
                    placeholder="Example:Romance, Novel, Fictional, etc" value="{{old('tags')}}"/>
                @error('tags')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="cover" class="inline-block text-lg mb-2">
                    Book cover </label>
                <input type="file" class="border border-gray-200 rounded p-2 w-full" name="cover" value="{{old('logo')}}"/>
                {{--            @error('logo')--}}
                {{--            <p class="text-red-500 text-xs mt-1">{{$message}}</p>--}}
                {{--            @enderror--}}
            </div>

            <div class="mb-6">
                <label for="description" class="inline-block text-lg mb-2">
                   Book Description
                </label>
                <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10">
                    {{old('description')}}</textarea>
                @error('description')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button
                    class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                   Register Book
                </button>

                <a href="/books" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </div>
</x-layout>
