<div class="container py-8">

    {{-- CREATE SUBCATEGORY - FORM SECTION --}}
    <x-jet-form-section class="mb-6" submit="save">

        <x-slot name="title">
            Create new department
        </x-slot>

        <x-slot name="description">
            Complete the needed information to create a new department
        </x-slot>

        <x-slot name="form">
            {{-- Name --}}
            <div class="col-span-6">
                <x-jet-label class="mb-2">Name</x-jet-label>
                <x-jet-input wire:model="createForm.name" type="text" class="w-full" placeholder="Department name..."></x-jet-input>
                <x-jet-input-error class="mt-2 text-xs font-semibold" for="createForm.name" />
            </div>
        </x-slot>

        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">Department created!</x-jet-action-message>
            <x-jet-button class="px-6">
                Create department
            </x-jet-button>
        </x-slot>

    </x-jet-form-section>

    {{-- SUBCATEGORY LIST - ACTION SECTION --}}
    <x-jet-action-section>
        <x-slot name="title">
            Departments
        </x-slot>

        <x-slot name="description">
            List of existing departments
        </x-slot>

        <x-slot name="content">
            <table class="text-gray-600">
                <thead class="border-b border-gray-300">
                    <tr class="text-left">
                        <th class="py-2 w-full">Name</th>
                        <th class="py-2 text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($departments as $department)
                        <tr>
                            <td class="py-2">
                                <a href="{{ route('admin.departments.show', $department) }}" class="uppercase hover:font-bold hover:underline">
                                    {{ $department->name }}
                                </a>
                            </td>
                            <td class="py-2">
                                <div class="flex items-center justify-center gap-2">
                                    <x-jet-button wire:click="edit('{{$department->id}}')">
                                        <i class="fas fa-edit"></i>
                                    </x-jet-button>
                                    <x-jet-danger-button wire:click="$emit('deleteDepartment', '{{$department->id}}')">
                                        <i class="fas fa-trash"></i>
                                    </x-jet-danger-button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </x-slot>
    </x-jet-action-section>

    {{-- MODAL - EDIT SUBCATEGORY --}}
    <x-jet-dialog-modal wire:model="editForm.open">
        <x-slot name="title">
            Edit department
        </x-slot>

        <x-slot name="content">
            {{-- Name --}}
            <div class="mb-4">
                <x-jet-label class="mb-2">Name</x-jet-label>
                <x-jet-input wire:model="editForm.name" type="text" class="w-full" placeholder="Department name..."></x-jet-input>
                <x-jet-input-error class="mt-2 text-xs font-semibold" for="editForm.name" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <div class="flex flex-end gap-3">
                <x-jet-danger-button wire:click="$set('editForm.open', false)">
                    Cancel
                </x-jet-danger-button>

                <x-jet-button wire:click="update">
                    Save changes
                </x-jet-button>
            </div>
        </x-slot>
    </x-jet-dialog-modal>

    @push('script')
        <script>
            Livewire.on('deleteDepartment', departmentId => {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emitTo('admin.department-component', 'delete', departmentId);
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })
            });
        </script>
    @endpush

</div>
