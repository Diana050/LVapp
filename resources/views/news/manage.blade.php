<x-layout>
    <a href="{{ url()->previous() }}" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back</a>
    <x-card class="p-10">
          <header>
            <h1
                class="text-3xl text-center font-bold my-6 uppercase"
            >
                Manage your Posted Posts
            </h1>
        </header>

        <table class="w-full table-auto rounded-sm">
            <tbody>
            @unless($news->isEmpty())
                @foreach($news as $new)
            <tr class="border-gray-300">
                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                    <a href="/news/{{$new->id}}">{{$new->title}}</a>
                </td>
                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                    <a href="/news/{{$new->id}}/edit" class="text-blue-400 px-6 py-2 rounded-xl">
                        <i class="fa-solid fa-pen-to-square"></i>Edit</a>
                </td>
                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                    <form method="POST" action="/news/{{$new->id}}">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600">
                            <i class="fa-solid fa-trash-can"></i>Delete
                        </button>
                    </form>
                </td>
            </tr>
                @endforeach
            @else
            <tr class="border-gray-300">
                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                    <p class="text-center">No announcement</p>
                </td>
            </tr>
            @endunless
            </tbody>
        </table>
    </x-card>
</x-layout>
