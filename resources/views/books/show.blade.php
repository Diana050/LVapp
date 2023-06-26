<x-layout>

    <a href="/books" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back</a>
    <x-onebook-card :book="$book" :editionsCount="$editionsCount" :statistics="$statistics"/>

    @if($book->status === 'sale')
        <div class="text-lg my-4">
            <strong>Highest Price:</strong> {{$statistics->highest_price}}
        </div>
        <div class="text-lg my-4">
            <strong>Lowest Price:</strong> {{$statistics->lowest_price}}
        </div>
        <div class="text-lg my-4">
            <strong>Average Price:</strong> {{$statistics->average_price}}
        </div>
    @endif
</x-layout>
