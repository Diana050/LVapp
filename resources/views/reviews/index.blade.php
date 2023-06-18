<x-layout>

    <x-card>
        <form method="POST" action="{{ route('reviews.store', ['books_id' => $booksId]) }}">
            @csrf
            <div class="relative border-2 border-gray-100 m-4 rounded-lg">
                <div class="absolute top-4 left-3">
                    <i class="fa  text-gray-400 z-20 hover:text-gray-500"></i>
                </div>
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <input type="hidden" name="books_id" value="{{ $booksId }}">
                <input type="text" name="review"
                       class="h-14 w-full pl-10 pr-20 rounded-lg z-0 focus:shadow focus:outline-none"
                       placeholder="Write a review"/>
                <div class="absolute top-2 right-2">
                    <button type="submit" class="h-10 w-20 text-white rounded-lg bg-cyan-600 hover:bg-cyan-700">
                        Post
                    </button>
                </div>
            </div>
        </form>
    </x-card>
    <x-card class="mt-4 p-2 flex space-x-6">
        <table class="w-full table-auto rounded-sm">
            <tbody>
            @unless($reviews->isEmpty())
                @foreach ($reviews as $review)
                    <tr>
                        <td>{{ $review->user->UserName }}</td>
                        <td>{{ $review->review }}</td>
                        <td>{{ $review->created_at }}</td>
                    </tr>
                @endforeach
            @else
                <tr class="border-gray-300">
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        <p class="text-center">No reviews</p>
                    </td>
                </tr>
            @endunless
            </tbody>
        </table>
    </x-card>
    {{ $reviews->appends(['books_id' => $booksId])->links() }}
</x-layout>
