<x-layout>
    <x-card class="p-10">

        <header>
            <h1 class="text-3xl text-center font-bold my-6 uppercase">
                User Profile
            </h1>
        </header>

        <table class="w-full table-auto rounded-sm">
            <tbody>
            <tr class="border-gray-300">
                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                    <a href="/userProfile">
                        Manage your profile
                    </a>
                </td>
            </tr>
            <tr class="border-gray-300">
                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                    <a href="/news/manage">
                        Manage your posted topics
                    </a>
                </td>

            </tr>
            <tr class="border-gray-300">
                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                    <a href="/books/manage">
                        Manage your posted books
                    </a>
                </td>
            </tr>
            <tr class="border-gray-300">
                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                    <a href="/myRequest">
                        See all your books request
                    </a>
                </td>
            </tr>

            </tbody>
        </table>
  </x-card>
</x-layout>
