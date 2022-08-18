<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight capitalize">
            Users
        </h2>
    </x-slot>

    <div class="container py-8">

        <x-table-responsive>

            <div class="px-6 py-4">
                <x-jet-input type="text"
                    wire:model="search"
                    class="w-full"
                    placeholder="Search a user here..."
                />
            </div>

            @if ($users->count())
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                ID
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Name
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Email
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Role
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Admin
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">

                        @foreach ($users as $user)
                            <tr wire:key="{{$user->email}}">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-gray-700 text-sm">
                                        {{ $user->id }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="font-semibold text-gray-700 text-sm ">
                                        {{ $user->name }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-gray-700 italic text-sm">
                                        {{ $user->email }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-center text-gray-700 text-sm">
                                        @if ($user->roles->count())
                                            Admin
                                        @else
                                            No role assigned
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center justify-center gap-2">
                                        <label>
                                            <input wire:change="assignRole({{ $user->id }}, $event.target.value)" {{ count($user->roles) ? 'checked' : '' }}
                                                type="radio" value="1" name="{{ $user->email }}">
                                            Yes
                                        </label>
                                        <label>
                                            <input wire:change="assignRole({{ $user->id }}, $event.target.value)" {{ count($user->roles) ? '' : 'checked' }}
                                                type="radio" value="0" name="{{ $user->email }}" class="ml-2">
                                            No
                                        </label>
                                    </div>
                                </td>
                             </tr>
                        @endforeach

                    </tbody>
                </table>

            @else
                <div class="px-6 py-4">
                    <p class="text-center font-semibold">There are no users matching your search...</p>
                </div>
            @endif

            @if ($users->hasPages())
                <div class="px-6 py-4">
                    {{ $users->links() }}
                </div>
            @endif

        </x-table-responsive>
    </div>
</div>
