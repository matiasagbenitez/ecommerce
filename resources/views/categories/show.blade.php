<x-app-layout>

    <div class="container py-6">
        <figure class="mb-6">
            <img class="h-64 w-full object-cover object-center" src="{{ asset('storage/' . $category->image) }}" alt="">
        </figure>

        @livewire('category-filter', ['category' => $category])
    </div>

</x-app-layout>
