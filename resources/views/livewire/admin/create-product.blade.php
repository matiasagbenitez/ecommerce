<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8 text-gray-700">
    <x-slot name="header">
        <div class="flex items-center">
            <p class="font-semibold text-gray-600 text-xl leading-tight">Add new product</p>
        </div>
    </x-slot>

    <div class="grid grid-cols-2 gap-6">

        {{-- SELECT CATEGORIES --}}
        <div>
            <x-jet-label class="mb-2" value="Categories" />
            <select class="w-full input-control" wire:model="category_id">
                <option selected disabled value="">Select a category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <x-jet-input-error class="mt-2 text-xs font-semibold" for="category_id" />
        </div>

        {{-- SELECT SUBCATEGORIES --}}
        <div>
            <x-jet-label class="mb-2" value="Subcategories" />
            <select class="w-full input-control" wire:model="subcategory_id">
                <option selected disabled value="">Select a subcategory</option>
                @foreach ($subcategories as $subcategory)
                    <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                @endforeach
            </select>
            <x-jet-input-error class="mt-2 text-xs font-semibold" for="subcategory_id" />
        </div>

        {{-- INPUT NAME --}}
        <div class="col-span-2">
            <x-jet-label class="mb-2" value="Name" />
            <x-jet-input wire:model="name" type="text" placeholder="Product name..." class="w-full" />
            <x-jet-input-error class="mt-2 text-xs font-semibold" for="name" />
        </div>

        {{-- INPUT SLUG --}}
        <div class="col-span-2">
            <x-jet-label class="mb-2" value="Slug" />
            <x-jet-input wire:model="slug" type="text" placeholder="Product slug..." class="w-full bg-gray-200" disabled />
            <x-jet-input-error class="mt-2 text-xs font-semibold" for="slug" />
        </div>

        {{-- TEXTAREA DESCRIPTION --}}
        <div class="col-span-2">
            <div wire:ignore>
                <x-jet-label class="mb-2" value="Description" />
                <textarea
                    x-ref="miEditor"
                    wire:model="description"
                    class="w-full input-control" rows="6"
                    x-data
                    x-init="ClassicEditor
                    .create( $refs.miEditor )
                    .then(function(editor) {
                        editor.model.document.on('change:data', () => {
                            @this.set('description', editor.getData())
                        })
                    })
                    .catch( error => {
                        console.error( error );
                    } );">
                </textarea>
            </div>
            <x-jet-input-error class="mt-2 text-xs font-semibold"  for="description" />
        </div>

        {{-- BRANDS --}}
        <div>
            <x-jet-label class="mb-2" value="Brand" />
            <select class="input-control w-full">
                <option value="" disabled selected>Select a brand</option>
                @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                @endforeach
            </select>
            <x-jet-input-error class="mt-2 text-xs font-semibold" for="brand_id" />
        </div>

        {{-- PRICE --}}
        <div>
            <x-jet-label class="mb-2" value="Price" />
            <x-jet-input wire:model="price" type="number" step=".01" class="w-full" />
            <x-jet-input-error class="mt-2 text-xs font-semibold" for="price" />
        </div>

        {{-- Producto sin color ni talle (solo cantidad) --}}
        @if ($subcategory_id)
            @if (!$this->subcategory->color && !$this->subcategory->color)
                <div>
                    <x-jet-label wire:model="quantity" class="mb-2" value="Quantity" />
                    <x-jet-input type="number" class="w-full" />
                    <x-jet-input-error class="mt-2 text-xs font-semibold" for="quantity" />
                </div>
            @endif
        @endif

        <div class="col-span-2 flex">
            <x-jet-button
                wire:click="save"
                wire:target="save"
                wire:loading.attr="disabled"
                class="ml-auto">
                Create product
            </x-jet-button>
        </div>

    </div>

</div>
