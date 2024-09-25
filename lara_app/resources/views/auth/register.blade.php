<x-layout>
    <x-slot:heading>Register User</x-slot:heading>

    <form method="POST" action="/register">
        @csrf
        <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base font-semibold leading-7 text-gray-900">Register User</h2>

            <div class="mt-10 w-full flex flex-col justify-center items-center gap-4">
                <div class="w-full">
                    <label for="first_name" class="block text-sm font-medium leading-6 text-gray-900">First Name</label>
                    <div class="mt-2">
                        <input type="text" value="{{old('first_name')}}" name="first_name" id="first_name"
                            autocomplete="first_name"
                            class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @error('first_name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="w-full">
                    <label for="last_name" class="block text-sm font-medium leading-6 text-gray-900">Last Name</label>
                    <div class="mt-2">
                        <input type="text" value="{{old('last_name')}}" name="last_name" id="last_name"
                            autocomplete="last_name"
                            class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @error('last_name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="w-full">
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                    <div class="mt-2">
                        <input type="text" value="{{old('email')}}" name="email" id="email" autocomplete="email"
                            class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="w-full">
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                    <div class="mt-2">
                        <input type="password" name="password" id="password" autocomplete="password"
                            class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="w-full">
                    <label for="password_confirmation" class="block text-sm font-medium leading-6 text-gray-900">Confirm
                        password</label>
                    <div class="mt-2">
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            autocomplete="password_confirmation"
                            class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @error('password_confirmation')
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