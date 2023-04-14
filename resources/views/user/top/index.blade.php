<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script> --}}
        <link rel="stylesheet" href="https://www.mng-teamate.com/css/app.css">
    <script src="https://www.mng-teamate.com/js/app.js" defer></script>
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
                                <a class="font-medium text-blue-600 hover:text-blue-400"
                                    href="{{ route('user.top.index') }}">トップページ</a>
                                <a class="font-medium text-gray-600 hover:text-gray-400"
                                    href="{{ route('user.attendance.index') }}">勤怠</a>
                                <a class="font-medium text-gray-600 hover:text-gray-400"
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
                    <div
                        class="lg:w-1/3 md:w-1/2 bg-gray-100 rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0 relative z-10 shadow-md mx-auto mb-12">
                        <article class="flex max-w-xl flex-col items-start justify-between">

                            <div class="group relative">

                                @if ($message === '出勤中')
                                    <h3 class="mt-3 text-lg font-semibold leading-6 text-green-400">
                                        <span class="absolute inset-0"></span>
                                        {{ $message }}
                                    @else
                                        <h3 class="mt-3 text-lg font-semibold leading-6 text-red-400">
                                            <span class="absolute inset-0"></span>
                                            {{ $message }}
                                @endif

                                </h3>
                            </div>
                            <div class="group relative">
                                <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-700">
                                    <p class="mt-5 text-sm leading-6 text-gray-600 line-clamp-3">日付</p>
                                    <span class="absolute inset-0 text-gray-700"></span>
                                    {{ $date }}
                                </h3>
                            </div>
                            <div class="group relative">
                                <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-700">
                                    <p class="mt-5 text-sm leading-6 text-gray-600 line-clamp-3">就業時刻</p>
                                    <span class="absolute inset-0 text-gray-700"></span>
                                    @if ($at_info)
                                        {{ $at_info->attendance_time }}
                                    @endif
                                </h3>
                            </div>
                            <div class="group relative">
                                <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-700">
                                    <p class="mt-5 text-sm leading-6 text-gray-600 line-clamp-3">体調</p>
                                    <span class="absolute inset-0 text-gray-700"></span>
                                    @if ($at_info)
                                        {{ $at_info->status }}
                                    @endif

                                </h3>
                            </div>
                            <div class="group relative">
                                <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-700">
                                    <p class="mt-5 text-sm leading-6 text-gray-600 line-clamp-3">業務種別</p>
                                    <span class="absolute inset-0 text-gray-700"></span>
                                    @if ($at_info)
                                        @if ($at_info->job_type === 1)
                                            <p>自社内業務</p>
                                        @elseif ($at_info->job_type === 2)
                                            <p>案件先業務</p>
                                        @endif

                                    @endif

                                </h3>
                            </div>

                            <div class="relative mt-8 flex items-center gap-x-4">

                                <div class="text-sm leading-6">
                                    <p class="font-semibold text-gray-900 text-lg">
                                        <a href="{{ route('user.profile.index') }}">
                                            <span class="absolute inset-0"></span>
                                            {{ $users->name }}
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </article>
                    </div>
                    @foreach ($tasks as $task)
                        <div
                            class="lg:w-1/3 md:w-1/2 bg-white rounded-lg p-8 flex flex-col md:ml-auto w-full mt-12 md:mt-0 relative z-10 shadow-md mx-auto">
                            <article class="flex max-w-xl flex-col items-start justify-between">

                                <div class="group relative">

                                    <h3
                                        class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                                        <a href="{{ route('user.task.edit', ['task' => $task->id]) }}">
                                            <span class="absolute inset-0"></span>
                                            {{ $task->title }}
                                        </a>
                                    </h3>
                                    <p class="mt-5 text-sm leading-6 text-gray-600 line-clamp-3">
                                        {{ $task->information }}
                                    </p>

                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
</body>

</html>
