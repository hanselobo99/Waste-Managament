<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="px-5 py-8">
                    @error('errorMsg')
                    <x-custom.flash type="error">{{$message}}</x-custom.flash>
                    @enderror
                    <form method="post" action="{{route('user.store')}}">
                        @csrf
                        <x-custom.input name="name" label="Name"></x-custom.input>
                        <x-custom.input name="email" label="Email" type="email"></x-custom.input>
                        <x-custom.input name="phone" label="Phone"></x-custom.input>
                        <x-custom.input name="password" label="Password" type="password"></x-custom.input>
                        <x-custom.input name="password_confirmation" label="Confirm Password"
                                        type="password"></x-custom.input>
                        <x-custom.select name="role" label="Role"
                                         :options="['admin'=>'Admin','driver'=>'Driver']"></x-custom.select>
                        <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
