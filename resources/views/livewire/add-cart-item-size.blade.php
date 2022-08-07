<div x-data>

    {{-- TALLA --}}
    <div>
        <p class="text-xl text-gray-700 my-2">Size:</p>

        <select wire:model="sizeC" class="input-control w-full">
            <option value="" selected disabled>Select a size</option>
            @foreach ($sizes as $size)
                <option value="{{ $size->id }}">{{ $size->name }}</option>
            @endforeach
        </select>
    </div>

    {{-- COLOR --}}
    <div>
        <p class="text-xl text-gray-700 my-2">Color:</p>

        <select wire:model="colorC" class="input-control w-full">
            <option value="" selected disabled>Select a color</option>
            @foreach ($colors as $color)
                <option class="capitalize" value="{{ $color->id }}">{{ $color->name }}</option>
            @endforeach
        </select>
    </div>

    {{-- AGREGAR AL CARRITO --}}
    <div class="flex gap-5 mt-4">

        {{-- Cantidad --}}
        <div>
            <x-jet-secondary-button
                disabled
                x-bind:disabled="$wire.qty <= 1"
                wire:loading.attr="disabled"
                wire:target="decrement"
                wire:click="decrement">
                -
            </x-jet-secondary-button>

            <span class="mx-2">{{ $qty }} </span>

            <x-jet-secondary-button
                x-bind:disabled="$wire.qty >= $wire.quantity"
                wire:loading.attr="disabled"
                wire:target="increment"
                wire:click="increment">
                +
            </x-jet-secondary-button>
        </div>

        {{-- Botón agregar carrito --}}
        <div class="flex-1">
            <x-jet-secondary-button x-bind:disabled="!$wire.quantity" class="w-full text-white bg-orange-500 hover:bg-orange-600 hover:text-white">
                <span class="text-center">Add to cart</span>
            </x-jet-secondary-button>
        </div>

    </div>

</div>
