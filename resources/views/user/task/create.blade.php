<x-app-layout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        {{-- tailwind --}}

                        <div class="container px-5 py-24 mx-auto flex">
                            <div
                                class="lg:w-1/3 md:w-1/2 bg-white rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0 relative z-10 shadow-md mx-auto">
                                <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">タスク登録</h2>
                                <p class="leading-relaxed mb-5 text-gray-600">本日のタスクを登録してください</p>
                                <form method="POST" action="{{ route('user.task.store') }}">
                                    @csrf
                                    <div class="relative mb-4">
                                        <label for="title" class="leading-7 text-sm text-gray-600">タスク名</label>
                                        <input type="title" id="title" name="title" required
                                            class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                    <div class="relative mb-4">
                                        <label for="information" class="leading-7 text-sm text-gray-600">タスク詳細</label>
                                        <textarea id="information" name="information"
                                            class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                                    </div>
                                    <button
                                        class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">登録する</button>
                                </form>
                            </div>
                        </div>

                        {{-- end --}}
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>