<x-app-layout>
    <section class="text-gray-600 body-font">
        <div class="container py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-20">
                <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">稼働実績表</h1>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-midium text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="pl-6 py-3">
                                月/日
                            </th>
                            <th scope="col" class="py-3">
                                種別
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
                                作業内容
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($works as $work)
                            <tr class="bg-white border-b">
                                <th scope="row" class="px-6 py-4 font-medium">
                                    {{ $work->created_at->format('m/d') }}
                                </th>
                                <td class=" py-4">
                                    <label for="job_type" class="sr-only"></label>
                                    <select id="job_type" name="job_type"
                                        class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 appearance-none focus:outline-none focus:ring-0 peer">
                                        @if ($work->attendance_time == '欠勤')
                                            <option value="1">欠勤</option>
                                        @else
                                            <option value="0" selected>出勤</option>
                                            <option value="1">欠勤</option>
                                            <option value="2">有給休暇</option>
                                            <option value="3">特別休暇</option>
                                            <option value="4">遅刻早退</option>
                                            <option value="5">待機</option>
                                        @endif
                                    </select>

                                </td>
                                <td class="px-6 py-4">
                                    {{ $work->attendance_time }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ substr($work->leaving_time, 11, 5) }}
                                </td>
                                <td class="px-6 py-4">
                                    <input class="border-0 border-b-2 border-gray-200 p-0" type="time" name="leaving_time" @if($work->attendance_time == '欠勤') value=" " @else value="01:00" @endif>
                                </td>
                                <td class="px-6 py-4">
                                    <input class="border-0 border-b-2 border-gray-200 p-0" type="time" name="leaving_time" @if($work->attendance_time == '欠勤') value=" " @else value="08:00" @endif>
                                </td>
                                <td class="px-6 py-4">
                                    <input class="w-full border-gray-200" type="text" name="work_detail">
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>
    </section>
</x-app-layout>
