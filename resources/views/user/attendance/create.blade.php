<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{-- tailwind --}}

                    <div class="container px-5 py-24 mx-auto flex">
                        <div
                            class="lg:w-1/3 md:w-1/2 bg-white rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0 relative z-10 shadow-md mx-auto">
                            <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">勤怠登録</h2>
                            <p class="leading-relaxed mb-5 text-gray-600">本日の勤怠を登録してください</p>
                            <form method="POST" action="{{ route('user.attendance.store') }}">
                                @csrf
                                <div class="relative mb-4">
                                    <label for="attendance" class="leading-7 text-sm text-gray-600">出勤時間</label>
                                    <input type="time" name="attendance" required class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                                <div class="relative mb-4">
                                    <label for="status" class="leading-7 text-sm text-gray-600">体調</label>
                                    <select type="status" id="status" name="status" required
                                        class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        <option value="良好">良好</option>
                                        <option value="普通">普通</option>
                                        <option value="不良">不良</option>
                                    </select>
                                </div>
                                <div class="relative mb-4">
                                    <label for="jobType" class="leading-7 text-sm text-gray-600">種別</label>
                                    <select id="task_selector" type="jobType" id="jobType" name="jobType" required
                                        class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        <option selected value="1">案件先業務</option>
                                        <option value="2">自社内業務</option>
                                    </select>
                                </div>
                                <div style="display: none;" id="task_name" class="relative mb-4">
                                    <label for="title" class="leading-7 text-sm text-gray-600">業務名</label>
                                    <input type="title" id="title" name="title"
                                        class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                                <div style="display: none;" id="task_information" class="relative mb-4">
                                    <label for="information" class="leading-7 text-sm text-gray-600">業務詳細</label>
                                    <textarea id="information" name="information"
                                        class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                                </div>

                                <button id="Button"
                                    class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">登録する</button>
                            </form>
                        </div>
                    </div>

                    {{-- end --}}
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#task_selector').on('change', function() {
                if ($(this).val() === "2") {
                    $('#task_name').show();
                    $('#task_information').show();
                } else {
                    $('#task_name').hide();
                    $('#task_information').hide();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            const $btn = $('#Button');

            $btn.on('click', function() {
                $btn.text('送信中...');
                setTimeout(function() {
                    $btn.prop('disabled', true);
                }, 200);
            });
        });
    </script>
    {{-- <script>
        const btn = document.getElementById("Button");

        function disableButton() {
            // ボタンがクリックされたときの処理
            btn.textContent = '送信中...'; // テキストを変更する
            // 0.1秒後にボタンを完全に無効化する
            setTimeout(function() {
                btn.disabled = true;
            }, 100);
        };
    </script> --}}
</x-app-layout>
