<x-admin-layout>
    <div class="w-full mt-12">
        <p class="text-xl pb-3 flex items-center">
            <i class="fas fa-list mr-3"></i> 管理者名簿
        </p>
        <div class="bg-white overflow-auto">
            @if ($admin->access_level === "1")
                <div class="flex justify-end mb-4">
                    <button class="mt-4 w-32 h-12 bg-green-400 text-white rounded mr-2"
                        onclick=" location.href='{{ route('admin.manager.create') }}'">管理者登録</button>
                </div>
            @endif
            <table class="text-left w-full border-collapse">
                <thead class="bg-gray-800">
                    <tr>
                        <th
                            class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-white border-b border-grey-light">
                            名前</th>
                        <th
                            class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-white border-b border-grey-light">
                            役職</th>
                        <th
                            class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-white border-b border-grey-light">
                            権限レベル</th>
                        <th
                            class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($managers as $manager)
                        <tr class="hover:bg-grey-lighter">
                            <td class="py-4 px-6 border-b border-grey-light">{{ $manager->name }}</td>
                            <td class="py-4 px-6 border-b border-grey-light">{{ $manager->email }}</td>
                            @if ($manager->access_level === "1")
                                <td class="py-4 px-6 border-b border-grey-light">閲覧・編集</td>
                            @elseif ($manager->access_level === "2")
                                <td class="py-4 px-6 border-b border-grey-light">案件閲覧のみ</td>
                            @elseif ($manager->access_level === "3")
                                <td class="py-4 px-6 border-b border-grey-light">社員情報の編集・閲覧</td>
                            @endif
                            @if ($admin->access_level === "1")       
                            <td class="py-4 px-6 border-b border-grey-light">
                                <button onclick="location.href='{{ route('admin.manager.edit', ['manager' => $manager->id]) }}'"
                                    class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border-2 border-blue-200 font-semibold text-blue-500 hover:text-white hover:bg-blue-500 hover:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                    編集
                                </button>
                            </td>
                            @endif
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>
