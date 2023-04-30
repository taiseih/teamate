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
                            {{-- リクエストされたURLがtopのもの全て、このナビメニューを表示 --}}
                            @if (Request::is('top*'))
                                <div
                                    class="flex flex-col gap-5 mt-5 sm:flex-row sm:items-center sm:justify-end sm:mt-0 sm:pl-5">
                                    <a class="font-bold text-blue-500 hover:text-blue-400"
                                        href="{{ route('user.top.index') }}">トップページ</a>
                                    <a class="font-medium text-gray-500 hover:text-gray-400"
                                        href="{{ route('user.attendance.index') }}">勤怠</a>
                                    <a class="font-medium text-gray-500 hover:text-gray-400"
                                        href="{{ route('user.work.index') }}">稼働実績</a>
                                    <a class="font-medium text-gray-500 hover:text-gray-400"
                                        href="{{ route('user.profile.index') }}"><svg xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                            class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </a>
                                </div>
                                {{-- リクエストされたURLがattendace,absenceのもの全て、このナビメニューを表示 --}}
                            @elseif (Request::is('attendance*', 'absence*'))
                                <div
                                    class="flex flex-col gap-5 mt-5 sm:flex-row sm:items-center sm:justify-end sm:mt-0 sm:pl-5">
                                    <a class="font-medium text-gray-500 hover:text-gray-400"
                                        href="{{ route('user.top.index') }}">トップページ</a>
                                    <a class="font-bold text-blue-500 hover:text-blue-400"
                                        href="{{ route('user.attendance.index') }}">勤怠</a>
                                    <a class="font-medium text-gray-500 hover:text-gray-400"
                                        href="{{ route('user.work.index') }}">稼働実績</a>
                                    <a class="font-medium text-gray-500 hover:text-gray-400"
                                        href="{{ route('user.profile.index') }}"><svg
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </a>
                                </div>
                                {{-- リクエストされたURLがtaskのもの全て、このナビメニューを表示 --}}
                            @elseif (Request::is('task*'))
                                <div
                                    class="flex flex-col gap-5 mt-5 sm:flex-row sm:items-center sm:justify-end sm:mt-0 sm:pl-5">
                                    <a class="font-medium text-gray-500 hover:text-gray-400"
                                        href="{{ route('user.top.index') }}">トップページ</a>
                                    <a class="font-medium text-gray-500 hover:text-gray-400"
                                        href="{{ route('user.attendance.index') }}">勤怠</a>
                                    <a class="font-medium text-gray-500 hover:text-gray-400"
                                        href="{{ route('user.work.index') }}">稼働実績</a>
                                    <a class="font-medium text-gray-500 hover:text-gray-400"
                                        href="{{ route('user.profile.index') }}"><svg
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </a>
                                </div>
                                {{-- リクエストされたURLがworkのもの全て、このナビメニューを表示 --}}
                            @elseif (Request::is('work*'))
                                <div
                                    class="flex flex-col gap-5 mt-5 sm:flex-row sm:items-center sm:justify-end sm:mt-0 sm:pl-5">
                                    <a class="font-medium text-gray-500 hover:text-gray-400"
                                        href="{{ route('user.top.index') }}">トップページ</a>
                                    <a class="font-medium text-gray-500 hover:text-gray-400"
                                        href="{{ route('user.attendance.index') }}">勤怠</a>
                                    <a class="font-bold text-blue-500 hover:text-blue-400"
                                        href="{{ route('user.work.index') }}">稼働実績</a>
                                    <a class="font-medium text-gray-500 hover:text-gray-400"
                                        href="{{ route('user.profile.index') }}"><svg
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </a>
                                </div>
                                {{-- リクエストされたURLがprofileのもの全て、このナビメニューを表示 --}}
                            @elseif (Request::is('profile*'))
                                <div
                                    class="flex flex-col gap-5 mt-5 sm:flex-row sm:items-center sm:justify-end sm:mt-0 sm:pl-5">
                                    <a class="font-medium text-gray-500 hover:text-gray-400"
                                        href="{{ route('user.top.index') }}">トップページ</a>
                                    <a class="font-medium text-gray-500 hover:text-gray-400"
                                        href="{{ route('user.attendance.index') }}">勤怠</a>
                                    <a class="font-medium text-gray-500 hover:text-gray-400"
                                        href="{{ route('user.work.index') }}">稼働実績</a>
                                    <a class="font-bold text-blue-500 hover:text-blue-400"
                                        href="{{ route('user.profile.index') }}"><svg
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </a>
                                </div>
                            @endif

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
                    <x-responsive-nav-link :href="route('user.task.create')" :active="request()->routeIs('user.task.create')">
                        {{ __('社内業務') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('user.work.index')" :active="request()->routeIs('user.work.index')">
                        {{ __('稼働実績') }}
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
