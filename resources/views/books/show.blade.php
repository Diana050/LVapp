<x-layout>

    <a href="/books" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back</a>
    <x-onebook-card :book="$book" :editionsCount="$editionsCount"/>

{{--    <p>Number of Editions: {{$editionsCount}}</p>--}}
</x-layout>
