@props(['new'])
@props(['comment'])



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

                    <a href="/comments/{{$new->id}}" class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80">
                        <i class="fa-solid fa-comments"></i> Comments</a>

                </div>
            </div>
        </div>
    </x-card>
{{--    <x-card class="mt-4 p-2 flex space-x-6">--}}
{{--        <table class="w-full table-auto rounded-sm">--}}
{{--            <tbody>--}}
{{--            @foreach ($comments as $comment)--}}
{{--                <tr>--}}
{{--                    <td>{{ $comment->user->UserName }}</td>--}}
{{--                    <td>{{ $comment->comment }}</td>--}}
{{--                </tr>--}}
{{--            @endforeach--}}
{{--            </tbody>--}}
{{--        </table>--}}
{{--    </x-card>--}}
</div>
