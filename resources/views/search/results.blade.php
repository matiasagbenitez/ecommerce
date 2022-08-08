<x-app-layout>
    <div class="container py-4">
        <ul>
            @forelse ($products as $product)
                <x-product-list :product="$product" />
            @empty
                <p class="text-md text-center italic text-gray-700">No products were found that match the parameters entered!</p>
            @endforelse
        </ul>

        <div class="my-2">
            {{ $products->links() }}
        </div>
    </div>
</x-app-layout>
