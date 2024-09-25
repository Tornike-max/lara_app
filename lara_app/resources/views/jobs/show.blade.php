<x-layout>
    <x-slot:heading>Job</x-slot:heading>

    <div class="w-full flex justify-center items-start flex-col gap-2">
        <p><strong>{{$job['title']}}</strong></p>
        <p>This job pays {{$job['salary']}} per year</p>

        @can('edit-job', $job)
        <div class="mt-8 w-full flex justify-start items-center gap-2">
            <a href="/jobs/{{$job['id']}}/edit"
                class="py-2 px-3 rounded-lg border-[2px] border-slate-500 bg-none hover:bg-slate-300 duration-200 transition-all ease-in-out">Edit</a>
            <form method="POST" action="/jobs/{{$job['id']}}">
                @csrf
                @method('delete')
                <button type="submit"
                    class="py-2 px-3 rounded-lg border-[2px] border-red-500 bg-none hover:bg-red-600 hover:text-white duration-200 transition-all ease-in-out">
                    Delete</button>
            </form>
        </div>
        @endcan

    </div>
</x-layout>