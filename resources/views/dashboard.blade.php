<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My tasks') }}
        </h2>
    </x-slot>
    @forelse ($tasks as $task)
        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <!--show all posts created by the user
                    if not posts display no posts-->

                        <div class="mb-4">
                            <h2 class="text-2xl font-bold">{{ $task->name }}</h2>
                            <p class="text-gray-600">{{ $task->description }}</p>
                            <div class="mt-2">
                                <a href="" class="text-blue-500">Read more</a>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    @empty
        <p>No tasks</p>
    @endforelse
</x-app-layout>
