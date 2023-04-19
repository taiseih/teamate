<x-app-layout>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        {{-- tailwind --}}

                        <div class="container px-5 py-24 mx-auto flex">
                            <div
                                class="lg:w-1/3 md:w-1/2 bg-white rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0 relative z-10 shadow-md mx-auto">
                                <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">業務内容編集</h2>
                                <form method="POST" action="{{ route('user.task.update', ['task' => $task->id]) }}">
                                    @csrf
                                    @method('put')
                                    <div class="relative mb-4">
                                        <label for="title" class="leading-7 text-sm text-gray-600">業務名</label>
                                        <input type="title" id="title" name="title" required
                                            value="{{ $task->title }}"
                                            class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                    <div class="relative mb-4">
                                        <label for="information" class="leading-7 text-sm text-gray-600">業務詳細</label>
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

</x-app-layout>

