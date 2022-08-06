<div>
    <div class="glider-contain">
        <ul class="glider">
            @foreach ($category->products as $product)
                <li class="bg-white rounded-lg shadow mb-4 overflow-hidden {{ $loop->last ? '' : 'mr-4' }}">
                    <article>
                        <figure>
                            <a href="#">
                                <img class="h-48 w-full object-cover object-center" src="{{ asset('storage/' . $product->image->first()->url) }}" alt="Product image">
                            </a>
                        </figure>
                        <div class="p-2">
                            <h1 class="font-semibold text-neutral-700"><a href="#">{{ Str::limit($product->name, 25) }}</a></h1>
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
</div>
