<x-app-layout>

        <div class="bg-white py-24 sm:py-32">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl lg:mx-0">
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">タスク一覧</h2>
                    <p class="mt-2 text-lg leading-8 text-gray-600">本日のタスクを確認できます
                    </p>
                    <button onclick="location.href='{{ route('user.task.create') }}'"
                        class="h-20 mt-12 text-white bg-green-500 border-0 py-2 px-6 focus:outline-none hover:bg-green-600 rounded text-lg">本日のタスクを登録する</button>
                </div>

                <div
                    class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-y-16 gap-x-8 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">



                    @foreach ($tasks as $task)
                        @foreach ($users as $user)
                            <article class="flex max-w-xl flex-col items-start justify-between">

                                <div class="group relative">
                                    <h3
                                        class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                                        <a href="{{ route('user.task.edit', ['task' => $task->id]) }}">
                                            <span class="absolute inset-0"></span>
                                            {{ $task->title }}
                                        </a>
                                    </h3>
                                </div>
                                <p class="mt-5 text-sm leading-6 text-gray-600 line-clamp-3">{{ $task->information }}
                                </p>
                                <div class="relative mt-8 flex items-center gap-x-4">
                                    <div class="text-sm leading-6">
                                        <p class="font-semibold text-gray-900">
                                            <a href="{{ route('user.profile.index') }}">
                                                <span class="absolute inset-0"></span>
                                                {{ $user->name }}
                                            </a>
                                        </p>
                                        <p class="text-gray-600">{{ $user->job }}</p>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    @endforeach

                    <!-- More posts... -->
                </div>
            </div>
        </div>

</x-app-layout>