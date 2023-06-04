<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/favicon.ico" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "#1b81b6",
                    },
                },
            },
        };
    </script>
    <title>WorkFlow</title>
</head>
<body class="mb-48">
<nav class="flex justify-between items-center mb-4">
    <a href="/news"
    ><img class="w-24" src="{{asset('images/WFLogo.jpg')}}" alt="" class="logo"
        /></a>
    <ul class="flex space-x-6 mr-6 text-lg">
        @auth

        <li>
            <span class="font-bold ">
                Welcome
            </span>
            <span class="font-bold uppercase ">
                {{auth()->user()->FirstName}}
            </span>
        </li>

            <li>
                <a href="/calendar" class="hover:text-laravel">
                    <i class="fa-solid fa-calendar"></i> Calendar</a>
            </li>
            <li>
                <a href="/leave" class="hover:text-laravel">
                    <i class="fa-solid fa-dove"></i> Leave</a>
            </li>
        <li>
            <a href="/news/manage" class="hover:text-laravel">
                <i class="fa-solid fa-gear"></i>Manage announcements</a>
        </li>
        <li>
            <form class="inline" method="POST"  action="/logout">
                @csrf
                <button type="submit">
                    <i class="fa-solid fa-door-closed"></i>Log out
                </button>
            </form>
        </li>

        @else

        <li>
            <a href="/register" class="hover:text-laravel">
                <i class="fa-solid fa-user-plus"></i> Register</a>
        </li>
{{--        <li>--}}
{{--            <a href="/login" class="hover:text-laravel">--}}
{{--                <i class="fa-solid fa-arrow-right-to-bracket"></i>Login</a>--}}
{{--        </li>--}}
        @endauth
    </ul>
</nav>
<main>
    {{$slot}}
</main>
<footer class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-24 mt-24 opacity-90 md:justify-center">
    <p class="ml-2">Copyright &copy; 2023, All Rights reserved</p>


</footer>
<x-flash-message/>
</body>
</html>
