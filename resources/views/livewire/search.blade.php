<div class="flex-1 relative" x-data>

    <form action="{{ route('search.results') }}" autocomplete="off">
        <x-jet-input name="name" wire:model="search" type="text" class="w-full" placeholder="What are you looking for?" />

        <button class="absolute top-0 right-0 w-12 h-full bg-orange-500 flex items-center justify-center rounded-r-md">
            <x-lupa size="35" color="white" />
        </button>
    </form>

    <div class="absolute w-full hidden" :class="{'hidden' : !$wire.open}" @click.away="$wire.open = false">
        <div class="bg-white rounded-lg shadow mt-1">
            <div class="px-4 py-3 space-y-1">
                @forelse ($products as $product)
                    <a href="{{ route('products.show', $product) }}" target="blank">
                        <div class="flex items-center hover:bg-gray-100 hover:cursor-pointer my-1">
                            <img class="h-9 w-16 object-cover object-center mr-3" src="{{ asset('storage/'.$product->image->first()->url) }}" alt="">
                            <div class="ml-1 text-gray-700 flex justify-between">
                                <p class="text-md font-semibold">{{ $product->name }} <span class="text-xs italic font-normal">on {{ $product->subcategory->category->name }}</span> </p>
                            </div>
                        </div>
                    </a>
                @empty
                    <p class="text-md text-center italic text-gray-700">No products were found that match the parameters entered!</p>
                @endforelse
            </div>
        </div>
    </div>

</div>
