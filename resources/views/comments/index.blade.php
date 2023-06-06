<x-layout>
        <x-card class="mt-4 p-2 flex space-x-6">
            <table class="w-full table-auto rounded-sm">
                <tbody>
                @foreach ($comments as $comment)
                    <tr>
                        <td>{{ $comment->user->UserName }}</td>
                        <td>{{ $comment->comment }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </x-card>
</x-layout>
