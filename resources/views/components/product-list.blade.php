@props(['product'])

<li class="bg-white rounded-lg shadow mb-6 overflow-hidden">
    <article class="flex">
        <figure>
            <a href="{{ route('products.show', $product)}}">
                <img class="h-full w-full object-cover object-center"
                    src="{{ asset('storage/' . $product->image->first()->url) }}" alt="">
            </a>
        </figure>
        <div class="flex-1 py-2 px-4 flex flex-col">
            <div class="flex justify-between">
                <div>
                    <h1 class="text-lg font-semibold text-neutral-700">
                        <a href="{{ route('products.show', $product)}}">{{ $product->name }}</a>
                    </h1>
                    <p class="text-sm text-neutral-500">USD ${{ $product->price }}</p>
                </div>
                <div class="flex">
                    <ul class="flex text-sm">
                        <li><i class="fas fa-star text-yellow-500 mr-1"></i></li>
                        <li><i class="fas fa-star text-yellow-500 mr-1"></i></li>
                        <li><i class="fas fa-star text-yellow-500 mr-1"></i></li>
                        <li><i class="fas fa-star text-yellow-500 mr-1"></i></li>
                        <li><i class="fas fa-star text-yellow-500 mr-1"></i></li>
                    </ul>
                    <span class="text-xs text-gray-700">(24)</span>
                </div>
            </div>

            <div class="mt-auto">
                <x-button class="bg-orange-300 hover:bg-orange-400" href="{{ route('products.show', $product)}}">
                    More info...
                </x-button>
            </div>
        </div>
    </article>
</li>
