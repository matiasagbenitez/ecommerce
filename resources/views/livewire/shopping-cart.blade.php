<div class="container my-4">

    <section class="bg-white rounded-lg shadow-lg p-4 text-gray-700 mb-4">

        <div class="flex justify-between">
            <h1 class="text-lg font-semibold uppercase mb-4">Shopping Cart</h1>
            <div>
                <a class="uppercase text-sm cursor-pointer hover:underline" wire:click="destroy">
                    <i class="fas fa-trash mr-2"></i>
                    Restart cart
                </a>
            </div>
        </div>

        @if (Cart::count())
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Unitary price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach (Cart::content() as $item)
                        <tr>
                            <td>
                                <div class="flex items-center">
                                    <img class="h-14 w-20 object-cover object-center mr-3" src="{{ $item->options->image }}" alt="">
                                    <div>
                                        <p class="font-semibold">{{ $item->name }}</p>
                                        @if ($item->options->color)
                                            <p class="text-sm">Color: {{ $item->options->color }}</p>
                                        @endif
                                        @if ($item->options->size)
                                            <p class="text-sm">Size: {{ $item->options->size }}</p>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="flex justify-center gap-5">
                                    <span>${{ $item->price }}</span>
                                    <a class="hover:cursor-pointer hover:text-red-500"
                                        wire:click="delete('{{$item->rowId}}')"
                                        wire:loading.class="text-red-600 opacity-25"
                                        wire:target="delete('{{$item->rowId}}')"
                                        >
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                            <td>
                                @if ($item->options->size)
                                    @livewire('update-cart-item-size', ['rowId' => $item->rowId], key($item->rowId))
                                @elseif ($item->options->color)
                                    @livewire('update-cart-item-color', ['rowId' => $item->rowId], key($item->rowId))
                                @else
                                    @livewire('update-cart-item', ['rowId' => $item->rowId], key($item->rowId))
                                @endif
                            </td>
                            <td>
                                <div class="flex justify-center">
                                    $ {{ $item->price * $item->qty }}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="text-center font-semibold text-gray-700">
                Your shopping cart is empty! Try adding something on it...
            </div>
        @endif

    </section>

    @if (Cart::count())
        <div class="bg-white rounded-lg shadow-lg p-3">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-gray-700">
                        <span class="font-bold text-lg">Total:</span>
                        ${{ Cart::subtotal() }}
                    </p>
                </div>
                <div>
                    <a href="{{ route('orders.create') }}" >
                        <x-jet-secondary-button class="bg-orange-500 border-orange-500 text-white hover:bg-orange-600 hover:text-white">
                            Continue
                        </x-jet-secondary-button>
                    </a>
                </div>
            </div>
        </div>
    @endif

</div>
