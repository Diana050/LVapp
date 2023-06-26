@props(['book'])

<x-card>
    <div class="flex">
        <img class="hidden w-48 mr-6 md:block" src="{{$book->cover ? asset('storage/' . $book->cover) : asset('/images/no-image.png')}}" alt=""/>
        <div>
            <h3 class="text-2xl mx-2">
                <a href="/books/{{$book->id}}">{{$book->title}}</a>
            </h3>
            <div class="my-2 mx-2" >
                <x-books-tag :tagsCsv="$book->tags"/>
            </div>
            <table>
                <tr>
                    <td class="px-2 text-lg text-left" >
                        <div class="text-lg my-1">
                            <i class="fa-solid fa-person"></i> {{$book->author}}
                        </div>
                    </td>
                    <td class="px-2  text-lg text-left">
                        <div class="text-lg my-1">
                            <i class="fa-solid fa-book-open"></i> {{$book->nOfPage}}
                        </div>
                    </td>
                    <td class="px-2  text-lg text-left">
                        <div class="text-lg my-1">
                            <i class="fa-solid fa-exchange"></i> {{$book->status}}
                            @if($book->status === 'sale')
                                {{$book->price}}<i class="fa-solid fa-euro"></i>
                            @endif

                        </div>
                    </td>

                </tr>
                <tr>
                    <td class="px-2  text-lg text-left">
                        <div class="text-lg my-1">
                            <i class="fa-solid fa-globe"></i> {{$book->languages}}
                        </div>
                    </td>
                    <td class="px-2  text-lg text-left">
                        <div class="text-lg my-1">
                            <i class="fa-solid fa-building"></i> {{$book->publishing_house}} {{$book->edition}}
                        </div>
                    </td>


                </tr>
                <tr>
                    <td class="px-2  text-lg text-left">
                        <div class="text-lg my-1">
                            <i class="fa-solid fa-building"></i> {{$book->publishing_house}}
                        </div>
                    </td>
                    <td class="px-2  text-lg text-left">
                        <div class="text-lg my-1">
                            <i class="fa-solid fa-user"></i> {{$book->user->UserName}}
                        </div>
                    </td>


                </tr>

            </table>
        </div>
    </div>
</x-card>
