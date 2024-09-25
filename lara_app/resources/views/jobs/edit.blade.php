<x-layout>
    <x-slot:heading>Create Job</x-slot:heading>

    <form method="POST" action="/jobs/update/{{$job['id']}}">
        @csrf
        @method('PUT')
        <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base font-semibold leading-7 text-gray-900">Edit Job</h2>

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-3">
                    <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Job Title</label>
                    <div class="mt-2">
                        <input type="text" value="{{$job['title']}}" name="title" id="title" autocomplete="job-title"
                            class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @error('title')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="sm:col-span-3">
                    <label for="salary" class="block text-sm font-medium leading-6 text-gray-900">Salary</label>
                    <div class="mt-2">
                        <input type="text" value="{{$job['salary']}}" name="salary" id="salary" autocomplete="salary"
                            class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @error('salary')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="sm:col-span-3">
                    <label for="employer_id" class="block text-sm font-medium leading-6 text-gray-900">Employer</label>
                    <div class="mt-2">
                        <select id="employer_id" value="{{$job['employer_id']}}" name="employer_id"
                            autocomplete="employer-id"
                            class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                            @foreach ($employers as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('employer_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
            <button type="submit"
                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
        </div>
    </form>
</x-layout>