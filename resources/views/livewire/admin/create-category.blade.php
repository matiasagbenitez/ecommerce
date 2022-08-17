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
                <x-jet-label class="mb-2">Category name</x-jet-label>
                <x-jet-input type="text" class="w-full"></x-jet-input>
            </div>

            {{-- Slug --}}
            <div class="col-span-6">
                <x-jet-label class="mb-2">Category slug</x-jet-label>
                <x-jet-input type="text" class="w-full"></x-jet-input>
            </div>

            {{-- Icon --}}
            <div class="col-span-6">
                <x-jet-label class="mb-2">Category icon</x-jet-label>
                <x-jet-input type="text" class="w-full"></x-jet-input>
            </div>

            {{-- Brands --}}
            <div class="col-span-6">
                <x-jet-label class="mb-2">Brands relateds</x-jet-label>
                <div class="grid grid-cols-4">
                    @foreach ($brands as $brand)
                        <x-jet-label>
                            <x-jet-checkbox></x-jet-checkbox>
                            {{ $brand->name }}
                        </x-jet-label>
                    @endforeach
                </div>
            </div>

            {{-- Image --}}
            <div class="col-span-6">
                <x-jet-label class="mb-2">Category image</x-jet-label>
                <x-jet-input type="file" class="w-full"></x-jet-input>
            </div>
        </x-slot>

        <x-slot name="actions">
            <x-jet-button>
                Add
            </x-jet-button>
        </x-slot>

    </x-jet-form-section>
</div>
