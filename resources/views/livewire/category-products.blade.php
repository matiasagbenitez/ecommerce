<div wire:init="loadPosts">

    @if (count($products))
        <div class="glider-contain">
            <ul class="glider-{{$category->id}}">
                @foreach ($products as $product)
                    <li class="bg-white rounded-lg shadow mb-4 overflow-hidden {{ $loop->last ? '' : 'sm:mr-4' }}">
                        <article>
                            <figure>
                                @if ($product->image->count())
                                    <a href="{{ route('products.show', $product)}}">
                                        <img class="h-48 w-full object-cover object-center"
                                            src="{{ asset('storage/' . $product->image->first()->url) }}" alt="">
                                    </a>
                                @else
                                    <a href="{{ route('products.show', $product)}}">
                                        <img class="h-48 w-full object-cover object-center"
                                            src="https://images.pexels.com/photos/4883800/pexels-photo-4883800.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
                                    </a>
                                @endif
                            </figure>
                            <div class="p-2">
                                <h1 class="font-semibold text-neutral-700"><a
                                        href="{{ route('products.show', $product)}}">{{ Str::limit($product->name, 25) }}</a></h1>
                                <p class="text-sm text-neutral-500">USD ${{ $product->price }}</p>
                            </div>
                        </article>
                    </li>
                @endforeach
            </ul>

            <button aria-label="Previous" class="glider-prev">«</button>
            <button aria-label="Next" class="glider-next">»</button>
            <div role="tablist" class="dots"></div>
        </div>
    @else
        <div class="flex justify-center items-center">
            <div class="spinner-border animate-spin inline-block w-8 h-8 border-4 rounded-full" role="status">
            </div>
        </div>
    @endif

</div>
