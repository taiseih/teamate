<x-app-layout>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        {{-- tailwind --}}

                        <div class="container px-5 py-24 mx-auto flex">
                            <div
                                class="lg:w-1/3 md:w-1/2 bg-white rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0 relative z-10 shadow-md mx-auto">
                                <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">欠勤登録</h2>
                                <p class="leading-relaxed mb-5 text-gray-600">欠勤情報を登録してください</p>
                                <form method="POST" action="{{ route('user.absence.store') }}">
                                    @csrf
                                    <input name="attendance" type="hidden" value="欠勤">
                                    <div class="relative mb-4">
                                        <label for="information" class="leading-7 text-sm text-gray-600">欠勤理由</label>
                                        <textarea required
                                            class="w-full h-48 bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                            name="information" id="information"></textarea>
                                    </div>

                                    <button onclick="disableButton()" id="Button"
                                        class="w-full text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">登録する</button>
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