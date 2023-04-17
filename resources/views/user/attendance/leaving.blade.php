<x-app-layout>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        {{-- tailwind --}}

                        <div class="container px-5 py-24 mx-auto flex">
                            <div
                                class="lg:w-1/3 md:w-1/2 bg-white rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0 relative z-10 shadow-md mx-auto">
                                <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">業務報告</h2>
                                <p class="leading-relaxed mb-5 text-gray-600">業務報告を行い退勤してください</p>
                                <form action="{{ route('user.attendance.update', ['attendance' => $at_info->id]) }}"
                                    method="POST">
                                    @csrf
                                    @method('put')
                                    <div class="relative mb-4">
                                        <label for="information" class="leading-7 text-sm text-gray-600">報告内容</label>
                                        <textarea required
                                            class="w-full h-48 bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                            name="information" id="information"></textarea>
                                    </div>
                                    <button
                                        class="w-full py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md bg-indigo-100 border border-transparent font-semibold text-indigo-500 hover:text-white hover:bg-indigo-500 focus:outline-none focus:ring-2 ring-offset-white focus:ring-indigo-500 focus:ring-offset-2 transition-all text-lg"
                                        type="submit" onclick="disableButton()" id="Button">
                                        退勤
                                    </button>
                                </form>
                            </div>
                        </div>

                        {{-- end --}}
                    </div>
                </div>
            </div>
        </div>
        <script>
            const btn = document.getElementById("Button");

            function disableButton() {
                // ボタンがクリックされたときの処理
                btn.textContent = '送信中...'; // テキストを変更する
                // 0.1秒後にボタンを完全に無効化する
                setTimeout(function() {
                    btn.disabled = true;
                }, 100);
            };
        </script>

</x-app-layout>