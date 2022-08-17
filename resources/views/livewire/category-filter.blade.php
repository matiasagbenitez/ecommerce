<div>

    {{-- Encabezado --}}
    <div class="bg-white rounded-lg shadow-lg mb-6">
        <div class="px-6 py-3 flex justify-between items-center">
            <h1 class="text-lg uppercase font-semibold text-neutral-700">{{ $category->name }}</h1>
            <div class="grid grid-cols-2 rounded-md border border-gray-300 divide-x divide-gray-300">
                <i wire:click="$set('view', 'grid')"
                    class="{{ $view == 'grid' ? 'text-orange-500' : '' }} fas fa-border-all p-3 text-gray-500 hover:text-orange-500 hover:cursor-pointer"></i>
                <i wire:click="$set('view', 'list')"
                    class="{{ $view == 'list' ? 'text-orange-500' : '' }} fas fa-th-list p-3 text-gray-500 hover:text-orange-500 hover:cursor-pointer"></i>
            </div>
        </div>
    </div>

    {{-- Grid de productos y barra lateral --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">

        {{-- Barra lateral --}}
        <aside>

            {{-- Subcategorías --}}
            <h2 class="text-lg font-semibold text-gray-700 mb-2">Subcategories</h2>
            <ul class="divide-y divide-gray-300">
                @foreach ($category->subcategories as $subcategory)
                    <li class="my-1">
                        <a href="#" wire:click="$set('subcategoryC', '{{ $subcategory->slug }}')"
                            class="text-sm text-gray-600 hover:cursor-pointer hover:text-orange-500 hover:font-semibold {{ $subcategoryC == $subcategory->slug ? 'text-orange-500 font-bold' : '' }}">
                            {{ $subcategory->name }}
                        </a>
                    </li>
                @endforeach
            </ul>

            {{-- Marcas --}}
            <h2 class="text-lg font-semibold text-gray-700 mt-6 mb-2">Brands</h2>
            <ul class="divide-y divide-gray-300">
                @foreach ($category->brands as $brand)
                    <li class="my-1">
                        <a href="#" wire:click="$set('brandC', '{{ $brand->name }}')"
                            class="text-sm text-gray-600 hover:cursor-pointer hover:text-orange-500 hover:font-semibold capitalize {{ $brandC == $brand->name ? 'text-orange-500 font-bold' : '' }}">
                            {{ $brand->name }}
                        </a>
                    </li>
                @endforeach
            </ul>

            <div class="flex justify-center">
                <x-jet-button class="mt-6" wire:click="cleanFilters">
                    Clean filters
                </x-jet-button>
            </div>

        </aside>

        {{-- Listado de productos --}}
        <div class="md:col-span-2 lg:col-span-4">

            {{-- Vista de GRID --}}
            @if ($view == 'grid')
                <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @forelse ($products as $product)
                        <li class="bg-white rounded-lg shadow mb-4 overflow-hidden">
                            <article>
                                <figure>
                                    @if ($product->image->count())
                                        <a href="{{ route('products.show', $product) }}">
                                            <img class="h-48 w-full object-cover object-center"
                                                src="{{ asset('storage/' . $product->image->first()->url) }}"
                                                alt="">
                                        </a>
                                    @else
                                        <a href="{{ route('products.show', $product) }}">
                                            <img class="h-48 w-full object-cover object-center"
                                                src="https://images.pexels.com/photos/4883800/pexels-photo-4883800.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                                                alt="">
                                        </a>
                                    @endif
                                </figure>
                                <div class="p-3">
                                    <h1 class="font-semibold text-neutral-700"><a
                                            href="{{ route('products.show', $product) }}">{{ Str::limit($product->name, 25) }}</a>
                                    </h1>
                                    <p class="text-sm text-neutral-500">USD ${{ $product->price }}</p>
                                </div>
                            </article>
                        </li>
                    @empty
                        <li class="md:col-span-2 lg:col-span-4">
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                                role="alert">
                                <strong class="font-bold">Ups!</strong>
                                <span class="block sm:inline">There are no matches with your search! Don't worry, try again!</span>
                            </div>
                        </li>
                    @endforelse
                </ul>
                {{-- Vista de LIST --}}
            @else
                <ul>
                    @forelse ($products as $product)
                        <x-product-list :product="$product" />
                    @empty
                        <li class="md:col-span-2 lg:col-span-4">
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                                role="alert">
                                <strong class="font-bold">Ups!</strong>
                                <span class="block sm:inline">There are no matches with your search! Try again with other terms.</span>
                            </div>
                        </li>
                    @endforelse
                </ul>
            @endif

            <div class="mt-3">
                {{ $products->links() }}
            </div>

        </div>
    </div>

</div>
