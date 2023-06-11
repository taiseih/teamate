<x-admin-layout>

        <!-- Page Content -->
        <main>
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            {{-- tailblocks --}}
                            <section class="text-gray-600 body-font relative">
                                <div class="container px-5 py-24 mx-auto">
                                    <div class="flex flex-col text-center w-full mb-12">
                                        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">
                                            管理者登録</h1>
                                    </div>
                                    <div class="lg:w-1/2 md:w-2/3 mx-auto">
                                        <form action="{{ route('admin.manager.store') }}"
                                            method="POST">
                                            @csrf
                                            <div class="text-center -m-2">
                                                <div class="p-2 w-1/2 mx-auto">
                                                    <div class="relative">

                                                        <label for="name"
                                                            class="leading-7 text-sm text-gray-600">名前</label>
                                                        <input type="text" id="name" name="name"
                                                            required
                                                            class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-green-500 focus:bg-white focus:ring-2 focus:ring-green-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                    </div>
                                                </div>

                                                <div class="p-2 w-1/2 mx-auto">
                                                    <div class="relative">
                                                        <label for="email"
                                                            class="leading-7 text-sm text-gray-600">メールアドレス</label>
                                                        <input type="email" id="email" name="email"
                                                            required
                                                            class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-green-500 focus:bg-white focus:ring-2 focus:ring-green-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                    </div>
                                                </div>

                                                <div class="p-2 w-1/2 mx-auto">
                                                    <div class="relative">
                                                        <label for="level"
                                                            class="leading-7 text-sm text-gray-600">権限レベル</label>
                                                        <select type="level" id="level" name="level" required
                                                            class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-green-500 focus:bg-white focus:ring-2 focus:ring-green-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                            <option value="1">閲覧・編集</option>
                                                            <option value="2">案件閲覧のみ</option>
                                                            <option value="3">社員情報の閲覧・編集</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="p-2 w-1/2 mx-auto">
                                                    <div class="relative">
                                                        <label for="password"
                                                            class="leading-7 text-sm text-gray-600">パスワード</label>
                                                        <input type="password" id="password" name="password"
                                                           required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-green-500 focus:bg-white focus:ring-2 focus:ring-green-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                    </div>
                                                </div>

                                                <div class="p-2 w-full mt-10">
                                                    <button type="submit"
                                                        class="flex mx-auto text-white bg-green-500 border-0 py-2 px-8 focus:outline-none hover:bg-green-600 rounded text-lg">登録</button>
                                                </div>
                                        </form>
                                        
                                    </div>

                                </div>
                        </div>
                        </section>
                        {{-- end tailblocks --}}
                    </div>
                </div>
            </div>
    </div>
    </main>
</x-admin-layout>