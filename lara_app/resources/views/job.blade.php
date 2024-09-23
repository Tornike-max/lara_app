<x-layout>
    <x-slot:heading>Job</x-slot:heading>

    <div class="w-full flex justify-center items-start flex-col gap-2">
        <p><strong>{{$job['title']}}</strong></p>
        <p>This job pays {{$job['salary']}} per year</p>
    </div>
</x-layout>