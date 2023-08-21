<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @if(empty($users))
                    <p>No Users</p>
                @else
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 ">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50  ">
                            <tr>
                                <th class="px-6 py-3">
                                    Sl.No
                                </th>
                                <th class="px-6 py-3">
                                    Name
                                </th>
                                <th class="px-6 py-3">
                                    Email
                                </th>
                                <th class="px-6 py-3">
                                    Phone
                                </th>
                                <th class="px-6 py-3">
                                    Role
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr class="bg-white border-b hover:bg-gray-50">
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                        {{$loop->index + 1}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$user->name}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$user->email}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$user->phone}}
                                    </td>
                                    <td class="px-6 py-4 capitalize">
                                        {{$user->role}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
