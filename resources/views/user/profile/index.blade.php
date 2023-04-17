<x-app-layout>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        {{-- tailwind --}}
                        @if (session('message'))
                            {{-- フラッシュメッセージ --}}
                            <div class="bg-indigo-400 text-center text-white mx-auto md:w-1/4 py-2 sm:w-full">
                                {{ session('message') }}
                            </div>
                        @endif
                        <div class="container px-5 py-24 mx-auto flex">

                            <div
                                class="lg:w-1/3 md:w-1/2 bg-white rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0 relative z-10 shadow-md mx-auto">
                                <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">プロフィール</h2>
                                <form method="POST"
                                    action="{{ route('user.profile.update', ['profile' => $user->id]) }}">
                                    @csrf
                                    @method('put')
                                    <div class="relative mb-4">
                                        <label for="name" class="leading-7 text-sm text-gray-600">名前</label>
                                        <input type="name" id="name" name="name" required
                                            value="{{ $user->name }}"
                                            class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                    <div class="relative mb-4">
                                        <label for="email" class="leading-7 text-sm text-gray-600">メールアドレス</label>
                                        <input type="email" id="email" name="email" required
                                            value="{{ $user->email }}"
                                            class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                    <div class="relative mb-4">
                                        <label for="password" class="leading-7 text-sm text-gray-600">パスワード</label>
                                        <input type="password" id="password" name="password" required
                                            class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                    <button type="submit"
                                        class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border-2 border-blue-200 font-semibold text-blue-500 hover:text-white hover:bg-blue-500 hover:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                        更新する
                                    </button>
                                </form>

                            </div>
                        </div>

                        <form action="{{ route('user.logout') }}" method="post">
                            @csrf
                            <button type="submit"
                                class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border-2 border-red-200 font-semibold text-red-500 hover:text-white hover:bg-red-500 hover:border-red-500 focus:outline-none focus:ring-2 focus:ring-red-200 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800"><a
                                    href="route('user.logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('ログアウト') }}</a>

                            </button>
                        </form>
                        {{-- end --}}
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
