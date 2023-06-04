@props(['new'])

<div class="mx-4">
    <x-card>
        <div class="flex flex-col items-center justify-center text-center">
            <img class="w-48 mr-6 mb-6" src="{{$new->logo ? asset('storage/' . $new->logo) : asset('/images/no-image.png')}}" alt=""/>

            <h3 class="text-2xl mb-2">{{$new->title}}</h3>
            <x-news-tag :tagsCsv="$new->tags"/>
            <div class="text-lg my-4">
                <i class="fa-solid fa-location-dot"></i> {{$new->location}}
            </div>
            <div class="text-lg my-4">
                <i class="fa-solid fa-calendar"></i> {{$new->day}}
            </div>
            <div class="border border-gray-200 w-full mb-6"></div>
            <div>
                <h3 class="text-3xl font-bold mb-4">
                    Description
                </h3>
                <div class="text-lg space-y-6">
                    <p>
                        {{$new->description}}
                    </p>

                    <a href="mailto:{{$new->contact}}" class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80">
                        <i class="fa-solid fa-envelope"></i> Contact Employer</a>

                </div>
            </div>
        </div>
    </x-card>
{{--    <x-card class="mt-4 p-2 flex space-x-6">--}}
{{--        <a href="/news/{{$new->id}}/edit">--}}
{{--            <i class="fa-solid fa-pencil"></i> Edit--}}
{{--        </a>--}}

{{--        <form method="POST" action="/news/{{$new->id}}">--}}
{{--            @csrf--}}
{{--            @method('DELETE')--}}
{{--            <button class="text-red-600">--}}
{{--                <i class="fa-solid fa-trash"></i>Delete--}}
{{--            </button>--}}
{{--        </form>--}}
{{--    </x-card>--}}
</div>
