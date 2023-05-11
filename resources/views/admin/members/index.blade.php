<x-admin-layout>
    <div class="w-full mt-12">
        <p class="text-xl pb-3 flex items-center">
            <i class="fas fa-list mr-3"></i> 社員名簿
        </p>
        <div class="bg-white overflow-auto">
            <div class="flex justify-end mb-4">
                <button class="mt-4 w-32 h-12 bg-green-400 text-white rounded mr-2"
                    onclick=" location.href='{{ route('admin.workers.create') }}'">社員登録</button>
            </div>
            <table class="text-left w-full border-collapse">
                <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
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
                            メールアドレス</th>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="hover:bg-grey-lighter">
                            <td class="py-4 px-6 border-b border-grey-light">{{ $user->name }}</td>
                            <td class="py-4 px-6 border-b border-grey-light">{{ $user->job }}</td>
                            <td class="py-4 px-6 border-b border-grey-light">{{ $user->email }}</td>
                            <td class="py-4 px-6 border-b border-grey-light">
                                <button onclick="location.href='{{route('admin.workers.edit', ['worker' => $user->id])}}'" class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border-2 border-blue-200 font-semibold text-blue-500 hover:text-white hover:bg-blue-500 hover:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                    編集
                                </button>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>
