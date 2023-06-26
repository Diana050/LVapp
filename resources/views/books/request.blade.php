<x-layout>
    <a href="{{ url()->previous() }}" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back</a>
    <x-card class="p-10">

        <header>
            <h1 class="text-3xl text-center font-bold my-6 uppercase">
                Requested Books
            </h1>
        </header>

        <table class="w-full table-auto rounded-sm">
            <tbody>
            @if($requests->isEmpty())
                <tr class="border-gray-300">
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg text-center">
                        <p>No requested books found.</p>
                    </td>
                </tr>
            @else<tr class="border-gray-300">
                <th class="px-2 py-4 border-t border-b border-gray-300 text-lg text-left">
                    Title
                </th>
                <th class="px-2 py-4 border-t border-b border-gray-300 text-lg text-left">
                    Author
                </th>
                <th class="px-2 py-4 border-t border-b border-gray-300 text-lg text-left">
                    User Name
                </th>

            </tr>
            @foreach($requests as $request)
            <tr class="border-gray-300">
                <td class="px-1 py-4 border-t border-b border-gray-300 text-lg">
                    {{ $request->book->title }}
                </td>
                <td class="px-1 py-4 border-t border-b border-gray-300 text-lg">
                    {{ $request->book->author }}
                </td>
                <td class="px-1 py-4 border-t border-b border-gray-300 text-lg">
                    {{ $request->user->UserName }}
                </td>

            </tr>
            @endforeach
            </tbody>
        </table>
        @endif
    </x-card>
</x-layout>
