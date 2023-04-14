<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script> --}}
        <link rel="stylesheet" href="https://www.mng-teamate.com/css/app.css">
    <script src="https://www.mng-teamate.com/js/app.js" defer></script>
</head>

<body class="antialiased">
    {{-- <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('user.login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth('users')
                        <a href="{{ url('/top') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">トップ</a>
                    @else
                        <a href="{{ route('user.login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('user.register'))
                            <a href="{{ route('user.register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div> --}}

    <section class="text-gray-600 body-font">
        <div class="container mx-auto flex px-5 py-24 items-center justify-center flex-col">
            <div class="text-center lg:w-2/3 w-full">
                    <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text--900">Teamate</h1>
                    @if (Route::has('user.login'))
                            @auth('users')
                                <a href="{{ url('/top') }}"
                                    class="text-sm text-gray-700 dark:text-gray-500">トップへ</a>
                            @else
                                <button onclick="location.href='{{ route('user.login') }}'"
                                    class="inline-flex text-white bg-green-500 border-0 py-2 px-6 focus:outline-none hover:bg-green-600 rounded text-lg">ログイン</button>
                                    @endauth
                        @endif
                </div>
        </div>
        </section>


    </body>

    </html>
