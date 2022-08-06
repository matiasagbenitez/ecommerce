<div wire:init="loadPosts">

    @if (count($products))
        <div class="glider-contain">
            <ul class="glider-{{$category->id}}">
                @foreach ($products as $product)
                    <li class="bg-white rounded-lg shadow mb-4 overflow-hidden {{ $loop->last ? '' : 'mr-4' }}">
                        <article>
                            <figure>
                                <a href="#">
                                    <img class="h-48 w-60 object-cover object-center"
                                        src="{{ asset('storage/' . $product->image->first()->url) }}" alt="">
                                </a>
                            </figure>
                            <div class="p-2">
                                <h1 class="font-semibold text-neutral-700"><a
                                        href="#">{{ Str::limit($product->name, 25) }}</a></h1>
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
