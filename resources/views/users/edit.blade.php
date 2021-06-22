<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Edit User
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl py-10 mx-auto sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('users.update', $user->id) }}">
                    @csrf
                    @method('put')
                    <div class="overflow-hidden shadow sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" name="name" id="name" class="block w-full mt-1 rounded-md shadow-sm form-input"
                                   value="{{ old('name', $user->name) }}" />
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="email" class="block w-full mt-1 rounded-md shadow-sm form-input"
                                   value="{{ old('email', $user->email) }}" />
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                            <input type="password" name="password" id="password" class="block w-full mt-1 rounded-md shadow-sm form-input" 
                                     value="{{ old('password', $user->password) }}"/>
                        </div>

                        <div class="flex items-center justify-end px-4 py-3 text-right bg-gray-50 sm:px-6">
                            <button class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25">
                                Edit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>