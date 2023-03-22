<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen">
        <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
            <!-- Primary Navigation Menu -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="shrink-0 flex items-center">
                            <a href="{{ route('user.dashboard') }}">
                                <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                            </a>
                        </div>
                    </div>

                    <!-- Settings Dropdown -->
                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        <div id="navbar-image-2"
                            class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow sm:block">
                            <div
                                class="flex flex-col gap-5 mt-5 sm:flex-row sm:items-center sm:justify-end sm:mt-0 sm:pl-5">
                                <a class="font-medium text-gray-600 hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-500"
                                    href="{{ route('user.dashboard') }}">ダッシュボード</a>
                                <a class="font-medium text-gray-600 hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-500"
                                    href="{{ route('user.attendance.index') }}">勤怠</a>
                                <a class="font-medium text-blue-600 hover:text-blue-400 dark:text-blue-500 dark:hover:text-blue-400"
                                    href="{{ route('user.task.index') }}">タスク</a>
                                <a class="font-medium text-gray-600 hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-500"
                                    href="{{ route('user.profile.index') }}">プロフィール</a>
                            </div>
                        </div>
                    </div>

                    <!-- Hamburger -->
                    <div class="-mr-2 flex items-center sm:hidden">
                        <button @click="open = ! open"
                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Responsive Navigation Menu -->
            <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
                <div class="pt-2 pb-3 space-y-1">
                    <x-responsive-nav-link :href="route('user.dashboard')" :active="request()->routeIs('user.dashboard')">
                        {{ __('ダッシュボード') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('user.attendance.index')" :active="request()->routeIs('user.attendance.index')">
                        {{ __('勤怠') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('user.task.index')" :active="request()->routeIs('user.task.index')">
                        {{ __('タスク') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('user.profile.index')" :active="request()->routeIs('user.profile.index')">
                        {{ __('プロフィール') }}
                    </x-responsive-nav-link>
                </div>

                <!-- Responsive Settings Options -->
                <div class="pt-4 pb-1 border-t border-gray-200">
                    <div class="px-4">
                        <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
                </div>
            </div>
        </nav>



        <div class="bg-white py-24 sm:py-32">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl lg:mx-0">
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">タスク一覧</h2>
                    <p class="mt-2 text-lg leading-8 text-gray-600">本日のタスクを確認できます
                    </p>
                </div>
                <div
                    class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-y-16 gap-x-8 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">



                    @foreach ($tasks as $task)
                        @foreach ($users as $user)
                            <article class="flex max-w-xl flex-col items-start justify-between">

                                <div class="group relative">
                                    <h3
                                        class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                                        <a href="{{ route('user.task.edit', ['task' => $task->id]) }}">
                                            <span class="absolute inset-0"></span>
                                            {{ $task->title }}
                                        </a>
                                    </h3>
                                </div>
                                <p class="mt-5 text-sm leading-6 text-gray-600 line-clamp-3">{{ $task->information }}
                                </p>
                                <div class="relative mt-8 flex items-center gap-x-4">
                                    <img src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                        alt="" class="h-10 w-10 rounded-full bg-gray-50">
                                    <div class="text-sm leading-6">
                                        <p class="font-semibold text-gray-900">
                                            <a href="{{ route('user.profile.index') }}">
                                                <span class="absolute inset-0"></span>
                                                {{ $user->name }}
                                            </a>
                                        </p>
                                        <p class="text-gray-600">{{ $user->job }}</p>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    @endforeach

                    <!-- More posts... -->
                </div>
            </div>
        </div>

</body>

</html>
