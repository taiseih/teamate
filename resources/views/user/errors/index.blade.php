<x-app-layout>
    <section class="text-gray-600 body-font">
        <div class="sm:w-4/5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-20">
                <h1 class="sm:text-4xl text-3xl font-bold title-font mb-2 text-gray-600">勤怠エラー</h1>
            </div>
            <div>
                <a href="{{route('user.work.index')}}" class="w-1/8 md:text-lg py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md font-semibold text-gray-500 hover:opacity-60 focus:outline-none focus:ring-2 focus:ring-gray-200 focus:ring-offset-2 transition-all text-sm mb-3">&lArr;勤怠一覧へ戻る</a>
            </div>

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
                                エラー理由
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($errors as $error)
                            <tr class="bg-white border-b">
                                <th scope="row" class="px-6 py-4 font-medium">
                                    {{ $error->created_at->format('m/d') }}
                                </th>

                                <td class="px-6 py-4 font-bold text-red-500">
                                    {{ $error->attendance }}
                                </td>
                                
                                <td class="px-6 py-4">
                                    @if ($error->error_info)    
                                        {{$error->error_info}}
                                    @else
                                        <button
                                    onclick="location.href='{{route('user.error.create', ['error' => $error->id])}}'"
                                    class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border-2 border-green-200 font-semibold text-green-500 hover:text-white hover:bg-green-500 hover:border-green-500 focus:outline-none focus:ring-2 focus:ring-green-200 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                    登録
                                </button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>
    </section>
</x-app-layout>
