@props(['new'])

<x-card>
    <div class="flex">
        <img class="hidden w-48 mr-6 md:block" src="{{$new->logo ? asset('/storage/' . $new->logo) : asset('/images/no-image.png')}}" alt=""/>
        <div>
            <h3 class="text-2xl">
                <a href="/news/{{$new->id}}">{{$new->title}}</a>
            </h3>
                <x-news-tag :tagsCsv="$new->tags"/>
            <div class="text-lg mt-4">
                <i class="fa-solid fa-document"></i> {{ Str::limit($new->description, 100) }}
            </div>

        </div>
    </div>
</x-card>
