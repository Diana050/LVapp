<x-layout>

    <x-card>
        <form method="POST" action="{{ route('comments.store', ['news_id' => $newsId]) }}">
            @csrf
            <div class="relative border-2 border-gray-100 m-4 rounded-lg">
                <div class="absolute top-4 left-3">
                    <i class="fa  text-gray-400 z-20 hover:text-gray-500"></i>
                </div>
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <input type="hidden" name="news_id" value="{{ $newsId }}">
                <input type="text" name="comment"
                    class="h-14 w-full pl-10 pr-20 rounded-lg z-0 focus:shadow focus:outline-none"
                    placeholder="Write a comment"/>
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
                @unless($comments->isEmpty())
                @foreach ($comments as $comment)
                    <tr>
                        <td>{{ $comment->user->UserName }}</td>
                        <td>{{ $comment->comment }}</td>
                        <td>{{ $comment->created_at }}</td>
                    </tr>
                @endforeach
                @else
                    <tr class="border-gray-300">
                        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                            <p class="text-center">No comments</p>
                        </td>
                    </tr>
                @endunless
                </tbody>
            </table>
        </x-card>
</x-layout>
