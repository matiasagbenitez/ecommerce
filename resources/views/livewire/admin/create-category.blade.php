<div>
    <x-jet-form-section submit="save">

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
            <x-jet-button class="px-6">
                Add
            </x-jet-button>
        </x-slot>

    </x-jet-form-section>
</div>
