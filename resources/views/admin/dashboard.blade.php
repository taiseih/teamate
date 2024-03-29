<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>

</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
            <!-- Primary Navigation Menu -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="shrink-0 flex items-center">
                            <a href="{{ route('admin.dashboard') }}">
                                <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                            </a>
                        </div>

                        <!-- Navigation Links -->
                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                                {{ __('管理画面') }}
                            </x-nav-link>
                        </div>
                    </div>

                    <!-- Settings Dropdown -->
                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                    <div>{{ Auth::user()->name }}</div>

                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <!-- Authentication -->
                                <x-dropdown-link :href="route('admin.profile.index')">
                                    {{ __('プロフィール') }}
                                </x-dropdown-link>
                                <form method="POST" action="{{ route('admin.logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('admin.logout')"
                                        onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                        {{ __('ログアウト') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
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
                    <x-responsive-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                        {{ __('管理画面') }}
                    </x-responsive-nav-link>
                </div>

                <!-- Responsive Settings Options -->
                <div class="pt-4 pb-1 border-t border-gray-200">
                    <div class="px-4">
                        <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>

                    <div class="mt-3 space-y-1">
                        <!-- Authentication -->
                        <x-dropdown-link :href="route('admin.profile.index')">
                            {{ __('プロフィール') }}
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('admin.logout') }}">
                            @csrf

                            <x-responsive-nav-link :href="route('admin.logout')"
                                onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                {{ __('ログアウト') }}
                            </x-responsive-nav-link>
                        </form>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Heading -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('管理画面') }}
                </h2>
            </div>
        </header>

        <!-- Page Content -->
        <main>
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <section class="text-gray-600 body-font justify-around flex">
                                <div class="container px-5 py-24">
                                    <div class="flex flex-wrap -m-4">
                                        <div class="p-4 lg:w-1/2 md:w-full">
                                            <a href="{{ route('admin.tasks.index') }}">
                                                <div
                                                    class="flex border-2 rounded-lg border-gray-200 border-opacity-50 p-8 sm:flex-row flex-col">
                                                    <div
                                                        class="w-16 h-16 sm:mr-8 sm:mb-0 mb-4 inline-flex items-center justify-center rounded-full bg-green-100 text-green-500 flex-shrink-0">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                                                        </svg>
                                                    </div>
                                                    <div class="flex-grow">
                                                        <h2 class="text-gray-900 text-lg title-font font-medium mb-3">
                                                            タスク管理
                                                        </h2>
                                                        <p class="leading-relaxed text-base">チームメンバーの本日のタスクを確認できます</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="p-4 lg:w-1/2 md:w-full">
                                            <a href="{{ route('admin.members.index') }}">
                                                <div
                                                    class="flex border-2 rounded-lg border-gray-200 border-opacity-50 p-8 sm:flex-row flex-col">
                                                    <div
                                                        class="w-16 h-16 sm:mr-8 sm:mb-0 mb-4 inline-flex items-center justify-center rounded-full bg-green-100 text-green-500 flex-shrink-0">
                                                        <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2" class="w-10 h-10"
                                                            viewBox="0 0 24 24">
                                                            <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                                                            <circle cx="12" cy="7" r="4">
                                                            </circle>
                                                        </svg>
                                                    </div>
                                                    <div class="flex-grow">
                                                        <h2 class="text-gray-900 text-lg title-font font-medium mb-3">
                                                            チームメンバー
                                                        </h2>
                                                        <p class="leading-relaxed text-base">チームメンバーの詳細を確認できます</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>

        </main>
    </div>
</body>

</html>
