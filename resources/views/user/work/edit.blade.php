<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div
                    class="lg:w-1/3 md:w-1/2 bg-gray-100 rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0 relative z-10 shadow-md mx-auto mb-12">

                    <article class="flex max-w-xl flex-col items-start justify-between">
                        <form action="{{ route('user.work.update', ['work' => $work->id]) }}" method="post" class="w-full">
                            @csrf
                            @method('put')
                            <div class="group relative">

                                </h3>
                            </div>
                            <div class="group relative">
                                <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-700">
                                    <p class="mt-5 text-sm leading-6 text-gray-600 line-clamp-3">日付</p>
                                    <span class="absolute inset-0 text-gray-700"></span>
                                    {{ $work->created_at->format('m/d') }}
                                </h3>
                            </div>

                            <p class="mt-5 text-sm leading-6 text-gray-600 font-bold line-clamp-3 text-center mb-2">出勤時間
                            </p>
                            <div class="group relative flex w-full justify-between">
                                <p class="mt-3 text-3xl font-semibold leading-6 text-gray-700">
                                    {{ $work->attendance_time }}</p>
                                <p class="mt-3 text-3xl font-semibold leading-6 text-gray-700">&rarr;&rarr;&rarr;</p>
                                <input
                                    class="w-1/3 bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                    type="time" name="attendance" value="{{ $work->attendance_time }}">
                            </div>

                            <p class="mt-5 text-sm leading-6 text-gray-600 font-bold line-clamp-3 text-center mb-2">退勤時間
                            </p>
                            <div class="group relative flex w-full justify-between">
                                <p class="mt-3 text-3xl font-semibold leading-6 text-gray-700">{{ $work->leaving_time }}
                                </p>
                                <p class="mt-3 text-3xl font-semibold leading-6 text-gray-700">&rarr;&rarr;&rarr;</p>
                                <input
                                    class="w-1/3 bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                    type="time" name="leaving" value="{{ $work->leaving_time }}">
                            </div>

                            <p class="mt-5 text-sm leading-6 text-gray-600 font-bold line-clamp-3 text-center mb-2">休憩時間
                            </p>
                            <div class="group relative flex w-full justify-between">
                                <p class="mt-3 text-3xl font-semibold leading-6 text-gray-700">{{ $work->rest_time }}
                                </p>
                                <p class="mt-3 text-3xl font-semibold leading-6 text-gray-700">&rarr;&rarr;&rarr;</p>
                                <input
                                    class="w-1/3 bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                    type="time" name="rest" value="{{ $work->rest_time }}">
                            </div>
                            <div class="w-full justify-between text-center mt-8">
                                <button
                                    class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border-2 border-green-200 font-semibold text-green-500 hover:text-white hover:bg-green-500 hover:border-green-500 focus:outline-none focus:ring-2 focus:ring-green-200 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                    更新する
                                </button>
                            </div>
                        </form>
                    </article>
                </div>


            </div>
        </div>
    </div>


</x-app-layout>
