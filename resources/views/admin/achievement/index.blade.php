<x-admin-layout>
    <div class="flex flex-wrap">
        @foreach ($users as $user)
            <div class="p-2 lg:w-1/3 md:w-1/2 w-full">
                <a href="{{ route('admin.achievement.personal', ['achievement' => $user->id]) }}">
                    <div class="h-full flex items-center bg-white border-gray-200 border p-4 rounded-lg">

                        <div class="flex-grow">
                            <h2 class="text-gray-900 text-xl title-font font-medium">
                                {{ $user->name }}</h2>
                            <p class="text-gray-500">{{ $user->job }}</p>
                            <p class="text-gray-500">{{ $user->email }}</p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</x-admin-layout>
