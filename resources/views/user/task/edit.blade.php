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
                            <a href="{{ route('user.top.index') }}">
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
                                <a class="font-medium text-gray-600 hover:text-gray-400"
                                    href="{{ route('user.top.index') }}">トップページ</a>
                                <a class="font-medium text-gray-600 hover:text-gray-400"
                                    href="{{ route('user.attendance.index') }}">勤怠</a>
                                <a class="font-medium text-blue-600 hover:text-blue-400"
                                    href="{{ route('user.task.index') }}">タスク</a>
                                <a class="font-medium text-gray-600 hover:text-gray-400"
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
                    <x-responsive-nav-link :href="route('user.top.index')" :active="request()->routeIs('user.top.index')">
                        {{ __('トップページ') }}
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

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        {{-- tailwind --}}

                        <div class="container px-5 py-24 mx-auto flex">
                            <div
                                class="lg:w-1/3 md:w-1/2 bg-white rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0 relative z-10 shadow-md mx-auto">
                                <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">タスク編集</h2>
                                <form method="POST" action="{{ route('user.task.update', ['task' => $task->id]) }}">
                                    @csrf
                                    @method('put')
                                    <div class="relative mb-4">
                                        <label for="title" class="leading-7 text-sm text-gray-600">タスク名</label>
                                        <input type="title" id="title" name="title" required
                                            value="{{ $task->title }}"
                                            class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                    <div class="relative mb-4">
                                        <label for="information" class="leading-7 text-sm text-gray-600">タスク詳細</label>
                                        <textarea id="information" name="information" value="{{ $task->information }}"
                                            class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{ $task->information }}</textarea>
                                    </div>
                                    <button type="submit"
                                        class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border-2 border-blue-200 font-semibold text-blue-500 hover:text-white hover:bg-blue-500 hover:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                        更新する
                                    </button>
                                </form>

                            </div>
                        </div>

                        <form action="{{ route('user.task.destroy', ['task' => $task->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit"
                                class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border-2 border-red-200 font-semibold text-red-500 hover:text-white hover:bg-red-500 hover:border-red-500 focus:outline-none focus:ring-2 focus:ring-red-200 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                削除
                            </button>
                        </form>
                        {{-- end --}}
                    </div>
                </div>
            </div>
        </div>
</body>

</html>
