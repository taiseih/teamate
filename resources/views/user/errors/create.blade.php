<x-app-layout>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        {{-- tailwind --}}
                        <div class="container px-5 py-24 mx-auto flex">

                            <div
                                class="lg:w-1/3 md:w-1/2 bg-white rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0 relative z-10 shadow-md mx-auto">
                                <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">プロフィール</h2>
                                <form method="POST"
                                    action="{{ route('user.error.update', ['error' => $user->id]) }}">
                                    @csrf
                                    @method('put')
                                    <div class="relative mb-4">
                                        <label for="info" class="leading-7 text-sm text-gray-600">名前</label>
                                        <input type="info" id="info" name="info" required
                                            value="{{ $errors_info->error_info }}"
                                            class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                    <button type="submit"
                                        class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border-2 border-blue-200 font-semibold text-blue-500 hover:text-white hover:bg-blue-500 hover:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                        更新する
                                    </button>
                                </form>

                            </div>
                        </div>
                        {{-- end --}}
                    </div>
                </div>
            </div>
        </div>

</x-app-layout>
