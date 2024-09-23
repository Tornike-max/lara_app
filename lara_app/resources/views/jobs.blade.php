<x-layout>
    <x-slot:heading>
        Jobs Page
    </x-slot:heading>
    @foreach ($jobs as $job)
    <a class="hover:underline text-blue-500" href="/jobs/{{$job['id']}}"
        class="flex justify-start items-center gap-2 border-b-[1px] border-gray-200">
        <p><strong>Title:</strong> {{$job['title']}}</p>
        <p><strong>Salary:</strong> {{$job['salary']}}</p>
    </a>
    @endforeach
</x-layout>