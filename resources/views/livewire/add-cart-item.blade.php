<div x-data>

    <p class="text-gray-700 text-md my-2">Stock: {{ $quantity }} units</p>

    <div class="flex gap-5">

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
        <div class="flex-1"
            wire:click="addItem"
            wire:loading.attr="disabled"
            wire:target="additem">
            <x-button class="w-full bg-orange-500 hover:bg-orange-600">
                <span class="text-center">Add to cart</span>
            </x-button>
        </div>

    </div>
</div>
