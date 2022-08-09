<div>
    <x-jet-dropdown width="96">

        <x-slot name="trigger">
            <span class="relative inline-block cursor-pointer">
                <x-cart size="30" color="white" />
                    @if (Cart::count())
                        <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full">{{ Cart::count() }}</span>
                    @else
                        <span class="absolute top-0 right-0 inline-block w-2 h-2 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full"></span>
                    @endif
            </span>
        </x-slot>

        <x-slot name="content">

            <ul>
                @forelse (Cart::content() as $item)
                    <li class="flex p-2 border-b border-gray-200">
                        <img class="h-15 w-20 object-cover object-center mr-3" src="{{ $item->options->image }}" alt="">
                        <article class="flex-1">
                            <h1 class="text-md font-bold">{{ $item->name }}</h1>
                            <div class="flex">
                                <p class="text-sm">Quantity: {{ $item->qty }} </p>
                                @isset($item->options['color'])
                                    <p class="ml-1 text-sm">- Color: {{ $item->options->color }}</p>
                                @endisset
                                @isset($item->options['size'])
                                    <p class="ml-1 text-sm">- Size: {{ $item->options->size }}</p>
                                @endisset
                            </div>
                            <p class="text-sm">USD: ${{ $item->price }}</p>
                        </article>
                    </li>
                @empty
                    <li class="py-6 px-4">
                        <p class="text-center text-gray-700">
                            You have no products added to your cart!
                        </p>
                    </li>
                @endforelse
            </ul>

            @if (Cart::count())
                <div class="p-2 flex justify-between uppercase">
                    <p class="font-bold text-gray-700 text-md">Total:</p>
                    <p class="text-gray-700 text-md">USD ${{ Cart::subtotal() }}</p>
                </div>
                <div class="px-2 pb-2">
                    <x-button href="{{ route('shopping-cart') }}" class="w-full bg-orange-500 hover:bg-orange-600">
                        Go to cart
                    </x-button>
                </div>
            @endif

        </x-slot>

    </x-jet-dropdown>
</div>
