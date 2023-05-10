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
                <thead>
                    <tr>
                        <th
                            class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                            名前</th>
                        <th
                            class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                            役職</th>
                        <th
                            class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                            メールアドレス</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="hover:bg-grey-lighter">
                            <td class="py-4 px-6 border-b border-grey-light">{{ $user->name }}</td>
                            <td class="py-4 px-6 border-b border-grey-light">{{ $user->job }}</td>
                            <td class="py-4 px-6 border-b border-grey-light">{{ $user->email }}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>
