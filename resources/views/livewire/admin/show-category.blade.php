<div class="container py-8">

    {{-- CREATE SUBCATEGORY - FORM SECTION --}}
    <x-jet-form-section class="mb-6" submit="save">

        <x-slot name="title">
            Create new subcategory
        </x-slot>

        <x-slot name="description">
            Complete the needed information to create a new subcategory
        </x-slot>

        <x-slot name="form">
            {{-- Name --}}
            <div class="col-span-6">
                <x-jet-label class="mb-2">Name</x-jet-label>
                <x-jet-input wire:model="createForm.name" type="text" class="w-full" placeholder="Subcategory name..."></x-jet-input>
                <x-jet-input-error class="mt-2 text-xs font-semibold" for="createForm.name" />
            </div>

            {{-- Slug --}}
            <div class="col-span-6">
                <x-jet-label class="mb-2">Slug</x-jet-label>
                <x-jet-input wire:model="createForm.slug" disabled type="text" class="w-full bg-gray-200" placeholder="Subcategory slug..."></x-jet-input>
                <x-jet-input-error class="mt-2 text-xs font-semibold" for="createForm.slug" />
            </div>

            {{-- Color --}}
            <div class="col-span-6">
                <div class="flex items-center">
                    <p class="text-gray-700 text-sm font-semibold">Does this subcategory need to specify color?</p>
                    <div class="ml-auto">
                        <label class="mr-4">
                            <input type="radio" value="1" name="color" wire:model.defer="createForm.color">
                            Yes
                        </label>
                        <label>
                            <input type="radio" value="0" name="color" wire:model.defer="createForm.color">
                            No
                        </label>
                    </div>
                    <x-jet-input-error class="mt-2 text-xs font-semibold" for="createForm.color" />
                </div>
            </div>

            {{-- Color --}}
            <div class="col-span-6">
                <div class="flex items-center">
                    <p class="text-gray-700 text-sm font-semibold">Does this subcategory need to specify size?</p>
                    <div class="ml-auto">
                        <label class="mr-4">
                            <input type="radio" value="1" name="size" wire:model.defer="createForm.size">
                            Yes
                        </label>
                        <label>
                            <input type="radio" value="0" name="size" wire:model.defer="createForm.size">
                            No
                        </label>
                    </div>
                    <x-jet-input-error class="mt-2 text-xs font-semibold" for="createForm.size" />
                </div>
            </div>

        </x-slot>

        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">Subcategory created!</x-jet-action-message>
            <x-jet-button class="px-6">
                Create subcategory
            </x-jet-button>
        </x-slot>

    </x-jet-form-section>

    {{-- SUBCATEGORY LIST - ACTION SECTION --}}
    <x-jet-action-section>
        <x-slot name="title">
            Subcategories
        </x-slot>

        <x-slot name="description">
            List of existing subcategories
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
                    @foreach ($subcategories as $subcategory)
                        <tr>
                            <td class="py-2">
                                <span class="uppercase">
                                    {{ $subcategory->name }}
                                </span>
                            </td>
                            <td class="py-2">
                                <div class="flex items-center justify-center gap-2">
                                    <x-jet-button wire:click="edit('{{$subcategory->id}}')">
                                        <i class="fas fa-edit"></i>
                                    </x-jet-button>
                                    <x-jet-danger-button wire:click="$emit('deleteSubcategory', '{{$subcategory->id}}')">
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
            Edit subcategory
        </x-slot>

        <x-slot name="content">
            <div class="space-y-3">

                {{-- Name --}}
                <div>
                    <x-jet-label class="mb-2">Name</x-jet-label>
                    <x-jet-input wire:model="editForm.name" type="text" class="w-full" placeholder="Subcategory name..."></x-jet-input>
                    <x-jet-input-error class="mt-2 text-xs font-semibold" for="editForm.name" />
                </div>

                {{-- Slug --}}
                <div>
                    <x-jet-label class="mb-2">Slug</x-jet-label>
                    <x-jet-input wire:model="editForm.slug" disabled type="text" class="w-full bg-gray-200" placeholder="Subcategory slug..."></x-jet-input>
                    <x-jet-input-error class="mt-2 text-xs font-semibold" for="editForm.slug" />
                </div>

                {{-- Color --}}
                <div>
                    <div class="flex items-center">
                        <p class="text-gray-700 text-sm font-semibold">Does this subcategory need to specify color?</p>
                        <div class="ml-auto">
                            <label class="mr-4">
                                <input type="radio" value="1" name="color" wire:model.defer="editForm.color">
                                Yes
                            </label>
                            <label>
                                <input type="radio" value="0" name="color" wire:model.defer="editForm.color">
                                No
                            </label>
                        </div>
                        <x-jet-input-error class="mt-2 text-xs font-semibold" for="editForm.color" />
                    </div>
                </div>

                {{-- Color --}}
                <div>
                    <div class="flex items-center">
                        <p class="text-gray-700 text-sm font-semibold">Does this subcategory need to specify size?</p>
                        <div class="ml-auto">
                            <label class="mr-4">
                                <input type="radio" value="1" name="size" wire:model.defer="editForm.size">
                                Yes
                            </label>
                            <label>
                                <input type="radio" value="0" name="size" wire:model.defer="editForm.size">
                                No
                            </label>
                        </div>
                        <x-jet-input-error class="mt-2 text-xs font-semibold" for="editForm.size" />
                    </div>
                </div>

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
            Livewire.on('deleteSubcategory', subcategoryId => {
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
                        Livewire.emitTo('admin.show-category', 'delete', subcategoryId);
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
