<div class="flex items-center justify-center" x-data>

    <x-jet-secondary-button
        disabled
        x-bind:disabled="$wire.qty <= 1"
        wire:loading.attr="disabled"
        wire:target="decrement"
        wire:click="decrement">
        -
    </x-jet-secondary-button>

    <span class="text-gray-500 mx-5">{{ $qty }}</span>

    <x-jet-secondary-button
        x-bind:disabled="$wire.qty >= $wire.quantity"
        wire:loading.attr="disabled"
        wire:target="increment"
        wire:click="increment">
        +
    </x-jet-secondary-button>

</div>
