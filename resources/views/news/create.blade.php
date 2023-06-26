<x-layout>

<div
    class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24"
>
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">
            Create new Topic
        </h2>
        <p class="mb-4">Post a new topic or news</p>
    </header>

    <form method="POST" action="/news" enctype="multipart/form-data">
@csrf

        <div class="mb-6">
            <label for="title" class="inline-block text-lg mb-2"
            >Topic Title</label
            >
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="title"
                placeholder="Example: Book Discussion"  value="{{old('title')}}"/>
            @error('title')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>



        <div class="mb-6">
            <label for="tags" class="inline-block text-lg mb-2">
                Tags (Comma Separated)
            </label>
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="tags"
                placeholder="Example: books, talk, opinion, etc" value="{{old('tags')}}"/>
            @error('tags')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="logo" class="inline-block text-lg mb-2">
                Company Logo
            </label>
            <input
                type="file"
                class="border border-gray-200 rounded p-2 w-full"
                name="logo" value="{{old('logo')}}"/>
{{--            @error('logo')--}}
{{--            <p class="text-red-500 text-xs mt-1">{{$message}}</p>--}}
{{--            @enderror--}}
        </div>

        <div class="mb-6">
            <label
                for="description"
                class="inline-block text-lg mb-2"
            >
                Topic Description
            </label>
            <textarea
                class="border border-gray-200 rounded p-2 w-full"
                name="description"
                rows="10"
                >{{old('description')}}</textarea>
            @error('description')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <button
                class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
            >
                Create Announcement
            </button>

            <a href="/news" class="text-black ml-4"> Back </a>
        </div>
    </form>
</div>
</x-layout>
