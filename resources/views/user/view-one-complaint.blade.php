<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Complaint') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="bg-white rounded-lg shadow-md p-6 max-w-xl mx-auto">
                    <h1 class="text-2xl font-semibold mb-4">Complaint Details</h1>
                    <div class="mb-6">
                        <p class="text-gray-600 mb-2">User Name: {{ $complaint->user->name }}</p>
                        <p class="text-gray-600 mb-2">Address: {{ $complaint->address }}</p>
                        <p class="text-gray-600 mb-2">Type: {{ $complaint->type }}</p>
                        <p class="text-gray-600 mb-2">Description: {{ $complaint->description }}</p>
                        <p class="text-gray-600 mb-2">Submitted On: {{ $complaint->created_at }}</p>
                        <p class="text-gray-600 mb-2">Status: {{ $complaint->complaintStatus->status }}</p>
                        <p class="text-gray-600 mb-2">Assigned
                            By: {{ $complaint->complaintStatus->assigned_by ?? 'Not Assigned' }}</p>
                    </div>


                    <div class="grid grid-cols-2 gap-2">
                        @foreach($complaint->complaintPhotos as $photo)
                            <div>
                                <img class="h-auto max-w-full rounded-lg" src="{{asset('storage/' . $photo->path)}}"
                                     alt="">
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
