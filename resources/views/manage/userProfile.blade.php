

<x-layout>
    <x-card class="p-10">

        <header>
            <h1 class="text-3xl text-center font-bold my-6 uppercase">
               Your Profile
            </h1>
        </header>

        <table class="w-full table-auto rounded-sm">
            <tbody>
            <tr class="border-gray-300">
                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                    <a href="">
                        Your User Name:
                        <span class="font-bold uppercase ">
                {{auth()->user()->UserName}}
            </span>
                    </a>
                </td>

            </tr>

            <tr class="border-gray-300">
                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                    <a href="">
                        Email address associated with this account:
                        <span class="font-bold ">
                {{auth()->user()->email}}
            </span>
                    </a>
                </td>

            </tr>


            </tbody>
        </table>
    </x-card>
</x-layout>
