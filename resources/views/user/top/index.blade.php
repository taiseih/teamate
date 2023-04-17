<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div
                    class="lg:w-1/3 md:w-1/2 bg-gray-100 rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0 relative z-10 shadow-md mx-auto mb-12">
                    <article class="flex max-w-xl flex-col items-start justify-between">

                        <div class="group relative">

                            @if ($message === '出勤中')
                                <h3 class="mt-3 text-lg font-semibold leading-6 text-green-400">
                                    <span class="absolute inset-0"></span>
                                    {{ $message }}
                                @else
                                    <h3 class="mt-3 text-lg font-semibold leading-6 text-red-400">
                                        <span class="absolute inset-0"></span>
                                        {{ $message }}
                            @endif

                            </h3>
                        </div>
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
                        <div class="group relative">
                            <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-700">
                                <p class="mt-5 text-sm leading-6 text-gray-600 line-clamp-3">業務種別</p>
                                <span class="absolute inset-0 text-gray-700"></span>
                                @if ($at_info)
                                    @if ($at_info->job_type === 1)
                                        <p>自社内業務</p>
                                    @elseif ($at_info->job_type === 2)
                                        <p>案件先業務</p>
                                    @endif

                                @endif

                            </h3>
                        </div>

                        <div class="relative mt-8 flex items-center gap-x-4">

                            <div class="text-sm leading-6">
                                <p class="font-semibold text-gray-900 text-lg">
                                    <a href="{{ route('user.profile.index') }}">
                                        <span class="absolute inset-0"></span>
                                        {{ $users->name }}
                                    </a>
                                </p>
                            </div>
                        </div>
                    </article>
                </div>
                @foreach ($tasks as $task)
                    <div
                        class="lg:w-1/3 md:w-1/2 bg-white rounded-lg p-8 flex flex-col md:ml-auto w-full mt-12 md:mt-0 relative z-10 shadow-md mx-auto">
                        <article class="flex max-w-xl flex-col items-start justify-between">

                            <div class="group relative">

                                <h3
                                    class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                                    <a href="{{ route('user.task.edit', ['task' => $task->id]) }}">
                                        <span class="absolute inset-0"></span>
                                        {{ $task->title }}
                                    </a>
                                </h3>
                                <p class="mt-5 text-sm leading-6 text-gray-600 line-clamp-3">
                                    {{ $task->information }}
                                </p>

                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


</x-app-layout>

