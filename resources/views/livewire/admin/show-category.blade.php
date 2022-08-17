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

</div>
