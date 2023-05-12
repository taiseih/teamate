<x-admin-layout>
    <!-- Page Content -->
    <h1 class="text-3xl text-black pb-6">本日の出勤メンバー</h1>

    <div class="flex flex-wrap mt-6">
        <div class="w-full lg:w-1/2 pr-0 lg:pr-2">
            <p class="text-xl pb-3 flex items-center">
                <i class="fas fa fa-user mr-3"></i> 自社内業務
            </p>
            <div class="w-full mt-12">
                <div class="bg-white overflow-auto">
                    <table class="min-w-full bg-white">
                        <thead class="bg-orange-500 text-white">
                            <tr>
                                <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">名前</th>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">体調</th>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">出勤時間</th>
                            </tr>
                        </thead>
                        @foreach ($users as $user)
                            @if ($at_info->where('user_id', $user->id)->first())
                                @if ($at_info->where('user_id', $user->id)->first()->job_type === 2)
                                    <tbody class="text-gray-700">
                                        @if ($at_info->where('user_id', $user->id)->first())
                                            <tr class="border-2">
                                                <td class="w-1/3 text-left py-3 px-4 font-bold text-gray-600">
                                                    {{ $user->name }}</td>
                                                <td class="text-left py-3 px-4 font-bold text-gray-600">
                                                    {{ $at_info->where('user_id', $user->id)->first()->status }}</td>
                                                <td class="text-left py-3 px-4 font-bold text-gray-600">
                                                    {{ $at_info->where('user_id', $user->id)->first()->attendance_time }}
                                                </td>
                                            </tr>
                                        @endif
                                @endif
                            @endif
                        @endforeach

                        <thead class="bg-orange-400 text-white">
                            <tr>
                                <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">名前</th>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">業務名</th>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">詳細</th>
                            </tr>
                        </thead>
                        @foreach ($tasks as $task)
                            <tbody class="text-gray-700">
                                <tr class="border-2">
                                    <td class="w-1/3 text-left py-3 px-4 font-bold text-gray-600">
                                        {{ $task->user->name }}</td>
                                    <td class="w-1/3 text-left py-3 px-4 font-bold text-gray-600">
                                        {{ $task->title }}</td>
                                    <td class="text-left py-3 px-4 font-bold text-gray-600">
                                        {{ $task->information }}
                                </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="w-full lg:w-1/2 pl-0 lg:pl-2 mt-12 lg:mt-0">
            <p class="text-xl pb-3 flex items-center">
                <i class="fas fa fa-users mr-3"></i> 案件先業務
            </p>
            <div class="w-full mt-12">
                <div class="bg-white overflow-auto">
                    <table class="min-w-full bg-white">
                        <thead class="bg-green-500 text-white">
                            <tr>
                                <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">名前
                                </th>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">体調</th>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">出勤時間</th>
                            </tr>
                        </thead>
                        @foreach ($users as $user)
                            @if ($at_info->where('user_id', $user->id)->first())
                                @if ($at_info->where('user_id', $user->id)->first()->job_type === 1)
                                    <tbody class="text-gray-700">
                                        @if ($at_info->where('user_id', $user->id)->first())
                                            <tr class="border-2">
                                                <td class="w-1/3 text-left py-3 px-4 font-bold text-gray-600">
                                                    {{ $user->name }}</td>
                                                <td class="text-left py-3 px-4 font-bold text-gray-600">
                                                    {{ $at_info->where('user_id', $user->id)->first()->status }}</td>
                                                <td class="text-left py-3 px-4 font-bold text-gray-600">
                                                    {{ $at_info->where('user_id', $user->id)->first()->attendance_time }}
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                @endif
                            @endif
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full lg:w-1/2 pl-0 lg:pl-2 mt-12 lg:mt-12">
        <p class="text-xl pb-3 flex items-center">
            <i class="fas fa fa-user-times mr-3"></i> 欠勤者
        </p>
        <div class="w-full mt-12">
            <div class="bg-white overflow-auto">
                <table class="min-w-full bg-white">
                    <thead class="bg-red-500 text-white">
                        <tr>
                            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">名前
                            </th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">欠勤理由</th>
                        </tr>
                    </thead>
                    @foreach ($users as $user)
                        @if ($at_info->where('user_id', $user->id)->first())
                            @if ($at_info->where('user_id', $user->id)->first()->attendance_time === '欠勤')
                                <tbody class="text-gray-700">
                                    @if ($at_info->where('user_id', $user->id)->first())
                                        <tr class="border-2">
                                            <td class="w-1/3 text-left py-3 px-4 font-bold text-gray-600">
                                                {{ $user->name }}</td>
                                            <td class="text-left py-3 px-4 font-bold text-gray-600">
                                                {{ $at_info->where('user_id', $user->id)->first()->information }}</td>
                                        </tr>
                                    @endif
                                </tbody>
                            @endif
                        @endif
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    </div>

</x-admin-layout>
