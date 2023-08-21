<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 ">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50  ">
                        <tr>
                            <th class="px-6 py-3">
                                Sl.No
                            </th>
                            <th class="px-6 py-3">
                                Type
                            </th>
                            <th class="px-6 py-3">
                                Address
                            </th>
                            <th class="px-6 py-3">
                                Status
                            </th>
                            <th class="px-6 py-3">
                                View
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($complaints as $complaint)
                            <tr class="bg-white border-b   hover:bg-gray-50">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                    {{$loop->index + 1}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$complaint->type}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$complaint->address}}
                                </td>
                                <td class="px-6 py-4 capitalize">
                                    {{$complaint->complaintStatus->status}}
                                </td>
                                <td class="px-6 py-4 capitalize">
                                    <a href="{{route('complaint.show',$complaint->id)}}"
                                       class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
