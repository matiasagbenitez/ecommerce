<div>
    {{-- CREATE CATEGORY - FORM SECTION --}}
    <x-jet-form-section class="mb-6" submit="save">

        <x-slot name="title">
            Create new category
        </x-slot>

        <x-slot name="description">
            Complete the needed information to create a new category
        </x-slot>

        <x-slot name="form">
            {{-- Name --}}
            <div class="col-span-6">
                <x-jet-label class="mb-2">Name</x-jet-label>
                <x-jet-input wire:model="createForm.name" type="text" class="w-full" placeholder="Category name..."></x-jet-input>
                <x-jet-input-error class="mt-2 text-xs font-semibold" for="createForm.name" />
            </div>

            {{-- Slug --}}
            <div class="col-span-6">
                <x-jet-label class="mb-2">Slug</x-jet-label>
                <x-jet-input wire:model="createForm.slug" disabled type="text" class="w-full bg-gray-200" placeholder="Category slug..."></x-jet-input>
                <x-jet-input-error class="mt-2 text-xs font-semibold" for="createForm.slug" />
            </div>

            {{-- Icon --}}
            <div class="col-span-6">
                <x-jet-label class="mb-2">Icon</x-jet-label>
                <x-jet-input wire:model.defer="createForm.icon" type="text" class="w-full" placeholder="Category icon..."></x-jet-input>
                <x-jet-input-error class="mt-2 text-xs font-semibold" for="createForm.icon" />
            </div>

            {{-- Brands --}}
            <div class="col-span-6">
                <x-jet-label class="mb-2">Brands relateds</x-jet-label>
                <div class="grid grid-cols-4">
                    @foreach ($brands as $brand)
                        <x-jet-label>
                            <x-jet-checkbox
                                wire:model.defer="createForm.brands"
                                name="brands[]"
                                value="{{ $brand->id }}">
                            </x-jet-checkbox>
                            {{ $brand->name }}
                        </x-jet-label>
                    @endforeach
                </div>
                <x-jet-input-error class="mt-2 text-xs font-semibold" for="createForm.brands" />
            </div>

            {{-- Image --}}
            <div class="col-span-6">
                <x-jet-label class="mb-2">Image</x-jet-label>
                <x-jet-input id="{{ $rand }}" wire:model="createForm.image" type="file" class="w-full" accept="image/*"></x-jet-input>
                <x-jet-input-error class="mt-2 text-xs font-semibold" for="createForm.image" />
            </div>
        </x-slot>

        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">Category created!</x-jet-action-message>
            <x-jet-button class="px-6">
                Create category
            </x-jet-button>
        </x-slot>

    </x-jet-form-section>

    {{--CATEGORY LIST - ACTION SECTION --}}
    <x-jet-action-section>
        <x-slot name="title">
            Categories
        </x-slot>

        <x-slot name="description">
            List of existing categories
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
                    @foreach ($categories as $category)
                        <tr>
                            <td class="py-2">
                                <span class="inline-block w-8 text-center mr-4">{!! $category->icon !!}</span>
                                <span class="uppercase">{{ $category->name }}</span>
                            </td>
                            <td class="py-2">
                                <div class="flex items-center justify-center gap-2">
                                    <x-jet-button wire:click="edit('{{$category->slug}}')">
                                        <i class="fas fa-edit"></i>
                                    </x-jet-button>
                                    <x-jet-danger-button wire:click="$emit('deleteCategory', '{{$category->slug}}')">
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

    {{-- MODAL - EDIT CATEGORY --}}
    <x-jet-dialog-modal wire:model="editForm.open">
        <x-slot name="title">
            Edit category
        </x-slot>

        <x-slot name="content">
            <div class="space-y-3">
                {{-- Name --}}
                <div>
                    <x-jet-label class="mb-2">Name</x-jet-label>
                    <x-jet-input wire:model="editForm.name" type="text" class="w-full" placeholder="Category name..."></x-jet-input>
                    <x-jet-input-error class="mt-2 text-xs font-semibold" for="editForm.name" />
                </div>

                {{-- Slug --}}
                <div>
                    <x-jet-label class="mb-2">Slug</x-jet-label>
                    <x-jet-input wire:model="editForm.slug" disabled type="text" class="w-full bg-gray-200" placeholder="Category slug..."></x-jet-input>
                    <x-jet-input-error class="mt-2 text-xs font-semibold" for="editForm.slug" />
                </div>

                {{-- Icon --}}
                <div>
                    <x-jet-label class="mb-2">Icon</x-jet-label>
                    <x-jet-input wire:model.defer="editForm.icon" type="text" class="w-full" placeholder="Category icon..."></x-jet-input>
                    <x-jet-input-error class="mt-2 text-xs font-semibold" for="editForm.icon" />
                </div>

                {{-- Brands --}}
                <div>
                    <x-jet-label class="mb-2">Brands relateds</x-jet-label>
                    <div class="grid grid-cols-5">
                        @foreach ($brands as $brand)
                            <x-jet-label>
                                <x-jet-checkbox
                                    wire:model.defer="editForm.brands"
                                    name="brands[]"
                                    value="{{ $brand->id }}">
                                </x-jet-checkbox>
                                {{ $brand->name }}
                            </x-jet-label>
                        @endforeach
                    </div>
                    <x-jet-input-error class="mt-2 text-xs font-semibold" for="editForm.brands" />
                </div>

                {{-- Image --}}
                <div class="grid grid-cols-2">
                    <div>
                        <x-jet-label class="mb-2">Current image</x-jet-label>
                        @if ($editImage)
                            <img class="w-16 h-16 rounded-lg object-cover object-center" src="{{ $editImage->temporaryUrl() }}" alt="">
                        @else
                            <img class="w-16 h-16 rounded-lg object-cover object-center" src="{{ asset('storage/' . $editForm['image']) }}" alt="">
                        @endif
                    </div>
                    <div>
                        <x-jet-label class="mb-2">Update image</x-jet-label>
                        <x-jet-input id="{{ $rand }}" wire:model="editImage" type="file" class="w-full" accept="image/*"></x-jet-input>
                        <x-jet-input-error class="mt-2 text-xs font-semibold" for="editImage" />
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
</div>
