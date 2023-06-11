<x-admin-layout>
    <section class="text-gray-600 body-font">
        <div class="sm:w-4/5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-20">
                <h1 class="sm:text-4xl text-3xl font-bold title-font mb-2 text-gray-600">エラー勤怠一覧</h1>
            </div>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-midium text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="pl-6 py-3">
                                月/日
                            </th>
                            <th scope="col" class="pl-6 py-3">
                                名前
                            </th>
                            <th scope="col" class="pl-6 py-3">
                                出勤時刻
                            </th>
                            <th scope="col" class="pl-6 py-3">
                                エラー理由
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($errors as $error)
                            <tr class="border-b @if(!$error->error_info) bg-red-500 opacity-60 text-white @else bg-white @endif">
                                <th scope="row" class="px-6 py-4 font-medium">
                                    {{ $error->created_at->format('m/d') }}
                                </th>

                                <td class="px-6 py-4">
                                    {{$error->user->name}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$error->attendance}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$error->error_info}}
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            
        </div>
    </section>

</x-admin-layout>
