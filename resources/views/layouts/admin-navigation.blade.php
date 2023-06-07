    <aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
        <div class="p-6">
            <p class="text-white text-3xl font-semibold uppercase">管理画面</p>
        </div>
        <nav class="text-white text-base font-semibold pt-3">
            <a href="{{ route('admin.workers.index') }}" class="flex items-center text-white py-4 pl-6 nav-item">
                <i class="fas fa-tachometer-alt mr-3"></i>
                出勤メンバー
            </a>
            <a href="{{ route('admin.members.index') }}"
                class="flex items-center text-white hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-table mr-3"></i>
                社員名簿
            </a>
            <a href="{{route('admin.achievement.index')}}" class="flex items-center text-white hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-align-left mr-3"></i>
                稼働実績
            </a>
    </aside>

    <div class="w-full flex flex-col h-screen overflow-y-hidden">
        <!-- Desktop Header -->
        <header class="w-full items-center bg-white py-2 px-6 hidden sm:flex">
            <div class="w-1/2"></div>
            <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
                <button @click="isOpen = !isOpen"
                    class="realtive z-10 w-12 h-12 rounded-full overflow-hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </button>
                <button x-show="isOpen" @click="isOpen = false"
                    class="h-full w-full fixed inset-0 cursor-default"></button>
                <div x-show="isOpen" class="absolute w-32 bg-white rounded-lg shadow-lg py-2 mt-16">
                    <a href="{{ route('admin.profile.index') }}"
                        class="block px-4 py-2 account-link hover:text-white text-base text-gray-600">アカウント</a>
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('admin.logout')"
                            onclick="event.preventDefault();
                                                this.closest('form').submit();"
                            class="block text-base account-link hover:bg-blue-400 hover:text-white text-gray-600">
                            {{ __('サインアウト') }}
                        </x-dropdown-link>
                    </form>
                </div>
            </div>
        </header>

        <!-- Mobile Header & Nav -->
        <header x-data="{ isOpen: false }" class="w-full bg-sidebar py-5 px-6 sm:hidden">
            <div class="flex items-center justify-between">
                <a href="index.html" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">管理画面</a>
                <button @click="isOpen = !isOpen" class="text-white text-3xl focus:outline-none">
                    <i x-show="!isOpen" class="fas fa-bars"></i>
                    <i x-show="isOpen" class="fas fa-times"></i>
                </button>
            </div>

            <!-- Dropdown Nav -->
            <nav :class="isOpen ? 'flex' : 'hidden'" class="flex flex-col pt-4">
                <a href="{{ route('admin.workers.index') }}"
                    class="flex items-center text-white py-2 pl-4 nav-item">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    出勤メンバー
                </a>
                <a href="{{ route('admin.members.index') }}"
                    class="flex items-center text-white hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-sticky-note mr-3"></i>
                    社員名簿
                </a>
                <a href="{{route('admin.achievement.index')}}"
                    class="flex items-center text-white hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-table mr-3"></i>
                    稼働実績
                </a>
                <a href="{{ route('admin.profile.index') }}"
                    class="block px-4 py-2 account-link hover:text-white text-base text-gray-300 font-bold">アカウント</a>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf

                    <x-dropdown-link :href="route('admin.logout')"
                        onclick="event.preventDefault();
                                                this.closest('form').submit();"
                        class="block text-base account-link hover:bg-blue-400 hover:text-white text-gray-300 font-bold">
                        <p class="font-bold text-gray-300">
                            サインアウト
                        </p>
                    </x-dropdown-link>
                </form>
            </nav>
            <!-- <button class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                <i class="fas fa-plus mr-3"></i> New Report
            </button> -->
        </header>
