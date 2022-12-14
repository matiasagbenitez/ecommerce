@props(['category'])

<div class="grid grid-cols-4 p-4">
    <div>
        <p class="text-sm font-bold text-center text-neutral-500 mb-3">Subcategories</p>

        <ul>
            @foreach ($category->subcategories as $subcategory)
                <li>
                    <a class="text-neutral-500 text-sm py-1 px-4 hover:text-orange-500 block" href="{{ route('categories.show', $category) . '?subcategoryC=' . $subcategory->slug }}">
                        {{ $subcategory->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="col-span-3">
        {{-- {{ Storage::url($categories->first()->image) }} --}}
        {{-- {{ asset('storage/' . $categories->first()->image) }} --}}
        <img class="h-64 w-full object-cover object-center" src="{{ asset('storage/' . $category->image) }}" alt="Imagen de la categoría">
    </div>
</div>
