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
                                        案件情報編集</h1>
                                </div>
                                <div class="lg:w-1/2 md:w-2/3 mx-auto">
                                    <form action="{{ route('admin.project.update', ['project' => $users->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="text-center -m-2">
                                            <div class="p-2 w-1/2 mx-auto">
                                                <div class="relative">

                                                    <label for="project"
                                                        class="leading-7 text-sm text-gray-600">案件名</label>
                                                    <input type="text" id="project" name="project"
                                                        value="{{ $users->project }}" required
                                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-green-500 focus:bg-white focus:ring-2 focus:ring-green-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                </div>
                                            </div>

                                            <div class="p-2 w-1/2 mx-auto">
                                                <div class="relative">
                                                    <label for="info"
                                                        class="leading-7 text-sm text-gray-600">プロジェクト詳細</label>
                                                    <textarea rows="8" type="info" id="info" name="info"
                                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-green-500 focus:bg-white focus:ring-2 focus:ring-green-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $users->project_info }}</textarea>
                                                </div>
                                            </div>

                                            <div class="p-2 w-1/2 mx-auto">
                                                <div class="relative">
                                                    <label for="text"
                                                        class="leading-7 text-sm text-gray-600">会社名</label>
                                                    <input type="company" id="company" name="company"
                                                        value="{{ $users->company }}" required
                                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-green-500 focus:bg-white focus:ring-2 focus:ring-green-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                </div>
                                            </div>

                                            <div class="p-2 w-1/2 mx-auto">
                                                <div class="relative">
                                                    <label for="company"
                                                        class="leading-7 text-sm text-gray-600">出勤時間</label>
                                                    <input type="time" id="company" name="attend"
                                                        value="{{ $users->project_attend }}" required
                                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-green-500 focus:bg-white focus:ring-2 focus:ring-green-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                </div>
                                            </div>

                                            <div class="p-2 w-full mt-10">
                                                <button type="submit"
                                                    class="flex mx-auto text-white bg-green-500 border-0 py-2 px-8 focus:outline-none hover:bg-green-600 rounded text-lg">更新</button>
                                            </div>
                                    </form>
                                    <div class="mt-10">
                                        <form method="POST"
                                            action="{{ route('admin.project.update', ['project' => $users->id]) }}">
                                            @csrf
                                            @method('delete')
                                            <td class="w-28">
                                                <button type="submit"
                                                    class="text-white bg-red-400 border-0 py-2 px-8 hover:bg-red-500 rounded"
                                                    onclick="return confirm('本当に削除しますか？')">
                                                    削除</button>
                                            </td>
                                        </form>
                                    </div>
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
