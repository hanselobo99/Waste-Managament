<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
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
                                    <div class="text-gray-600 mb-2">Assigned
                                        By: {{ $complaint->complaintStatus->user->name ?? 'Not Assigned' }}
                                    </div>
                                    <div>
                                        {{--                                        @if(strlen($complaint->complaintStatus->user->name) > 0)--}}
                                        {{--                                            @foreach($complaint->complaintStatus->complaintAssignedTo as $driver)--}}
                                        {{--                                                Driver : {{$driver->user->name}} Status : {{$driver->status}}--}}
                                        {{--                                            @endforeach--}}
                                        {{--                                        @else--}}
                                        {{--                                           f--}}
                                        {{--                                        @endif--}}
                                        @if(strlen($complaint->complaintStatus->user->name) > 0)
                                            Driver Status :
                                            @if($complaint->complaintStatus->complaintAssignedTo[0]->status == 'pending')
                                                <a href="{{route('driver.complaint.accept',$complaint->complaintStatus->complaintAssignedTo[0]->id)}}">
                                                    <button type="button"
                                                            class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                                        Accept
                                                    </button>
                                                </a>
                                                <a href="{{route('driver.complaint.reject',$complaint->complaintStatus->complaintAssignedTo[0]->id)}}">
                                                    <button type="button"
                                                            class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                                        Reject
                                                    </button>
                                                </a>
                                            @elseif($complaint->complaintStatus->complaintAssignedTo[0]->status == 'accepted')
                                                <a href="{{route('driver.complaint.complete',$complaint->complaintStatus->complaintAssignedTo[0]->id)}}">
                                                    <button type="button"
                                                            class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                                        Completed
                                                    </button>
                                                </a>
                                            @else
                                                {{$complaint->complaintStatus->complaintAssignedTo[0]->status}}
                                            @endif
                                        @endif
                                    </div>
                                </div>


                                <div class="grid grid-cols-2 gap-2">
                                    @foreach($complaint->complaintPhotos as $photo)
                                        <div>
                                            <img class="h-auto max-w-full rounded-lg"
                                                 src="{{asset('storage/' . $photo->path)}}"
                                                 alt="">
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<?php
