<x-app-layout>

        <div class="py-12">

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden sm:rounded-lg md:flex">
                    <div
                        class="lg:w-1/3 md:w-1/2 bg-gray-100 rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0 relative z-10 shadow-md mx-auto">
                        <article class="flex max-w-xl flex-col items-start justify-between">

                            <div class="group relative">
                                <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-700">
                                    <p class="mt-5 text-sm leading-6 text-gray-600 line-clamp-3">日付</p>
                                    <span class="absolute inset-0 text-gray-700"></span>
                                    {{ $date }}
                                </h3>
                            </div>
                            <div class="group relative">
                                <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-700">
                                    <p class="mt-5 text-sm leading-6 text-gray-600 line-clamp-3">就業時刻</p>
                                    <span class="absolute inset-0 text-gray-700"></span>
                                    @if ($at_info)
                                        {{ $at_info->attendance_time }}
                                    @endif
                                </h3>
                            </div>
                            <div class="group relative">
                                <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-700">
                                    <p class="mt-5 text-sm leading-6 text-gray-600 line-clamp-3">体調</p>
                                    <span class="absolute inset-0 text-gray-700"></span>
                                    @if ($at_info)
                                        {{ $at_info->status }}
                                    @endif

                                </h3>
                            </div>

                            <div class="relative mt-8 flex items-center gap-x-4">
                                <div class="text-sm leading-6">
                                    <p class="font-semibold text-gray-900">
                                        <a href="{{ route('user.profile.index') }}">
                                            <span class="absolute inset-0"></span>
                                            {{ $users->name }}
                                        </a>
                                    </p>
                                    <p class="text-gray-600">{{ $users->job }}</p>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="grid md:w-1/4 sm:w-full m-10">
                        @if (!$at_info)
                            {{-- 出勤情報がなかったら表示 --}}
                            <button type="button" onclick="location.href='{{ route('user.attendance.create') }}'"
                                class="mb-8 py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md bg-green-100 border border-transparent font-semibold text-green-500 hover:text-white hover:bg-green-500 focus:outline-none focus:ring-2 ring-offset-white focus:ring-green-500 focus:ring-offset-2 transition-all text-lg">
                                出勤登録
                            </button>
                        @endif

                        {{-- 出勤情報があったら退勤ボタンを表示 --}}
                        @if ($at_info)
                            @if ($at_info->attendance_time !== '欠勤'){{-- 欠勤かどうか判定 --}}
                                @if ($at_info->job_type === 1)
                                    <button type="button"
                                        onclick="location.href='{{ route('user.attendance.edit', ['attendance' => $at_info->id]) }}'"
                                        class=" py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md bg-indigo-100 border border-transparent font-semibold text-indigo-500 hover:text-white hover:bg-indigo-500 focus:outline-none focus:ring-2 ring-offset-white focus:ring-indigo-500 focus:ring-offset-2 transition-all text-lg">
                                        退勤
                                    </button>
                                    </form>
                                @else
                                    <form
                                        action="{{ route('user.attendance.update', ['attendance' => $at_info->id]) }}"
                                        method="POST"
                                        class=" py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md bg-indigo-100 border border-transparent font-semibold text-indigo-500 hover:text-white hover:bg-indigo-500 focus:outline-none focus:ring-2 ring-offset-white focus:ring-indigo-500 focus:ring-offset-2 transition-all text-lg">
                                        @csrf
                                        @method('put')
                                        <button type="submit" onclick="disableButton()" id="Button">
                                            退勤
                                        </button>
                                    </form>
                                @endif
                            @endif
                        @endif


                    </div>
                </div>
            </div>
        </div>
        @if (!$at_info)
            <div class="w-full text-center">
                <button type="button" onclick="location.href='{{ route('user.absence.create') }}'"
                    class="md:w-1/2 w-3/4 py-3 px-4 justify-center items-center rounded-md bg-red-100 border border-transparent font-semibold text-red-500 hover:text-white hover:bg-red-500 focus:outline-none focus:ring-2 ring-offset-white focus:ring-red-500 focus:ring-offset-2 transition-all text-lg">
                    欠勤登録
                </button>
            </div>
        @endif
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
