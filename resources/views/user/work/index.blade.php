<x-app-layout>
    <section class="text-gray-600 body-font">
        <div class="sm:w-4/5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-20">
                <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">稼働実績表</h1>
            </div>


            <form class="sm:w-1/2 md:w-1/4 w-full" action="{{ route('user.work.index') }}" method="get">
                @csrf
                <div class="flex">
                    <label
                        class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-l-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 ">稼働月を選択</label>
                    <div class="relative w-full">
                        <select name="search"
                            class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-r-lg border-l-gray-100 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                            <option value="全件">全て</option>
                            @for ($i = 1; $i <= 12; $i++)
                                <option value="{{ $i }}">{{ $i }}月分</option>
                            @endfor

                        </select>
                        <button type="submit"
                            class="absolute top-0 right-0 p-2.5 text-sm font-medium text-white bg-blue-700 rounded-r-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><svg
                                aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg></button>
                    </div>
                </div>
            </form>


            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-midium text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="pl-6 py-3">
                                月/日
                            </th>
                            <th scope="col" class="pl-6 py-3">
                                出勤時刻
                            </th>
                            <th scope="col" class="pl-6 py-3">
                                退勤時刻
                            </th>
                            <th scope="col" class="pl-6 py-3">
                                休憩時間
                            </th>
                            <th scope="col" class="pl-6 py-3">
                                稼働時間
                            </th>
                            <th scope="col" class="pl-6 py-3">
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($works as $work)
                            <tr class="bg-white border-b">
                                <th scope="row" class="px-6 py-4 font-medium">
                                    {{ $work->created_at->format('m/d') }}
                                </th>

                                <td class="px-6 py-4">
                                    {{ $work->attendance_time }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $work->leaving_time }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $work->rest_time }}
                                </td>
                                <td class="px-6 py-4">
                                    @php
                                        // 出勤時刻と退勤時刻が両方とも存在する場合
                                        if ($work->attendance_time !== '欠勤') {
                                            // 出勤時間と退勤時間をDateTimeオブジェクトに変換する
                                            $attendanceTime = new DateTime($work->attendance_time);
                                            $leavingTime = new DateTime($work->leaving_time);
                                        
                                            if ($work->rest_time !== null) {
                                                //休憩時間がnullじゃない時に$restTimeに休憩時間を格納
                                                $restTime = strtotime($work->rest_time) - strtotime('00:00:00'); //休憩時間をstrtotimeで秒数変換して、00:00:00からrest_timeの数値を引いて秒数を格納(int型)
                                            } else {
                                                //休憩時間がない時は0を格納する
                                                $restTime = 0;
                                            }
                                        
                                            // 稼働時間を計算する
                                            $diff = $attendanceTime->diff($leavingTime); //出勤時刻と退勤時刻の差分を求める(object(DateInterval)型)
                                            $diffSeconds = $diff->h * 3600 + $diff->i * 60 + $diff->s; //DateIntervalオブジェクトから、時間、分、秒の値を取得し、それぞれを3600秒、60秒で乗算し、すべての値を合計して、差を秒数に変換。最終的に計算された秒数を変数$diffSecondsに格納する。(int型)
                                            $workingSeconds = $diffSeconds - $restTime; //int型 変数diffSecondsで算出した勤務時間から休憩時間の秒数を引いて変数に格納
                                            $workingHours = sprintf('%01d時間%02d分', floor($workingSeconds / 3600), floor(($workingSeconds % 3600) / 60)); //時間は0埋め1桁、分数は0埋め2桁、floor関数で小数点切り捨て3600で割った結果を時間に、分数は余った数字を60で割る
                                        } else {
                                            //ない時はなにも入れない
                                            $workingHours = ' ';
                                        }
                                    @endphp

                                    <p>{{ $workingHours }}</p>
                                </td>
                                <td class="px-6 py-4">
                                    <button
                                        onclick="location.href='{{ route('user.work.edit', ['work' => $work->id]) }}'"
                                        class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border-2 border-blue-200 font-semibold text-blue-500 hover:text-white hover:bg-blue-500 hover:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                        編集
                                    </button>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>
    </section>
</x-app-layout>
