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
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium">
                                12/31
                            </th>
                            <td class=" py-4">
                                <label for="job_type" class="sr-only"></label>
                                <select id="job_type" name="job_type"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 appearance-none focus:outline-none focus:ring-0 peer">
                                    <option value="0" selected>出勤</option>
                                    <option value="1">欠勤</option>
                                    <option value="2">有給休暇</option>
                                    <option value="3">特別休暇</option>
                                    <option value="4">遅刻早退</option>
                                    <option value="5">待機</option>
                                </select>
                            </td>
                            <td class="px-6 py-4">
                                10:00
                            </td>
                            <td class="px-6 py-4">
                                19:00
                            </td>
                            <td class="px-6 py-4">
                                1:00
                            </td>
                            <td class="px-6 py-4">
                                8:00
                            </td>
                            <td class="px-6 py-4">
                                <input class="w-full border-gray-200" type="text" name="work_detail">
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

            <div class="flex pl-4 mt-4 lg:w-2/3 w-full mx-auto">
                <a class="text-blue-500 inline-flex items-center md:mb-2 lg:mb-0">Learn More
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                        <path d="M5 12h14M12 5l7 7-7 7"></path>
                    </svg>
                </a>
                <button
                    class="flex ml-auto text-white bg-blue-500 border-0 py-2 px-6 focus:outline-none hover:bg-blue-600 rounded">Button</button>
            </div>
        </div>
    </section>
</x-app-layout>
