<x-layout>
    <x-slot:heading>
        <h1 class="text-3xl font-bold text-gray-800">Jobs Page</h1>
    </x-slot:heading>

    <div class="mt-6 space-y-4">
        <div class="w-full flex justify-start items-center">
            <a href="/jobs/create"
                class="py-2 px-3 rounded-md bg-none border-[2px]  font-medium border-indigo-500 hover:bg-indigo-500 duration-200 transition-all ease-in-out text-indigo-500 hover:text-white">Create
                Job</a>
        </div>
        @foreach ($jobs as $job)
        <a href="/jobs/{{$job['id']}}"
            class="block p-4 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-blue-50 transition duration-300 ease-in-out">
            <div class="flex justify-between items-center">
                <p class="w-full text-lg font-semibold text-gray-900">{{$job->employer->name}}</p>
                <p class="w-full text-lg font-semibold text-gray-900 text-start">
                    <strong>Title:</strong> {{$job['title']}}
                </p>
                <p class="w-full text-lg font-semibold text-green-600 text-end">
                    <strong>Salary:</strong> ${{$job['salary']}}
                </p>
            </div>
        </a>
        @endforeach
        {{$jobs->links()}}
    </div>
</x-layout>