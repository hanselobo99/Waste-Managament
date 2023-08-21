<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('File complaint') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="px-5 py-8">
                    @error('errorMsg')
                    <x-custom.flash type="error">{{$message}}</x-custom.flash>
                    @enderror
                    <form method="post" action="{{route('complaint.store')}}" enctype="multipart/form-data">
                        @csrf
                        <x-custom.input name="address" label="Address"></x-custom.input>
                        <x-custom.select name="type" label="Nature of Complaint"
                                         :options="['al'=>'one']"></x-custom.select>
                        <x-custom.textarea name="description" label="Description"></x-custom.textarea>
                        <x-custom.file name="photo[]" label="Photo" type="file"></x-custom.file>
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
<?php
