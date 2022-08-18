<x-app-layout>
    <div class="container py-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <div>
                {{-- Slider --}}
                <div class="flexslider">
                    <ul class="slides">
                        @foreach ($product->image as $image)
                            <li data-thumb="{{ asset('storage/' . $image->url) }}">
                                <img src="{{ asset('storage/' . $image->url) }}" alt="">
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{-- Description --}}
                <div class="-mt-10 text-gray-700">
                    <h2 class="font-semibold text-lg">Description</h2>
                    <p class="text-sm">{!! $product->description !!}</p>
                </div>

                {{-- Review --}}
                @can('review', $product)
                    <div class="text-gray-700 mt-4">
                        <h2 class="font-bold text-lg mb-1">Publish a review</h2>
                        {{-- CKEDITOR --}}
                        <form action="">
                            <textarea id="editor"></textarea>

                            <div class="flex items-center mt-4" x-data="{rating: 5}">
                                <p class="mr-4 text-sm">Score:</p>
                                <ul class="flex my-2 space-x-2">
                                    <li x-bind:class="rating >= 1 ? 'text-yellow-500' : ''"><button x-on:click="rating=1" type="button" class="focus:outline-none"><i class="fas fa-star"></i></button></li>
                                    <li x-bind:class="rating >= 2 ? 'text-yellow-500' : ''"><button x-on:click="rating=2" type="button" class="focus:outline-none"><i class="fas fa-star"></i></button></li>
                                    <li x-bind:class="rating >= 3 ? 'text-yellow-500' : ''"><button x-on:click="rating=3" type="button" class="focus:outline-none"><i class="fas fa-star"></i></button></li>
                                    <li x-bind:class="rating >= 4 ? 'text-yellow-500' : ''"><button x-on:click="rating=4" type="button" class="focus:outline-none"><i class="fas fa-star"></i></button></li>
                                    <li x-bind:class="rating >= 5 ? 'text-yellow-500' : ''"><button x-on:click="rating=5" type="button" class="focus:outline-none"><i class="fas fa-star"></i></button></li>
                                </ul>
                                <input class="hidden" type="number" x-model="rating">
                                <x-jet-button class="ml-auto">
                                    Send review
                                </x-jet-button>
                            </div>
                        </form>
                    </div>
                @endcan

            </div>

            <div>
                <h1 class="text-3xl font-bold text-gray-500 mb-3">{{ $product->name }}</h1>
                <div class="flex justify-between items-center my-2">
                    <div>
                        <p class="text-sm">Brand:
                            <a class="text-orange-500 hover:underline hover:font-bold capitalize"
                                href="#">{{ $product->brand->name }}</a>
                        </p>
                    </div>
                    <div>
                        <a class="text-sm ml-10">5 <i class="fas fa-star text-sm text-yellow-500"></i></a>
                        <a class="text-sm ml-2 text-orange-500 underline" href="#">(39 reviews)</a>
                    </div>
                </div>

                <p class="text-xl my-3 font-semibold text-gray-700">USD ${{ $product->price }}</p>

                <div class="bg-white rounded-lg shadow-lg mb-3">
                    <div class="p-5 flex items-center gap-4">

                        <span class="flex items-center justify-center h-10 w-10 rounded-full bg-lime-600">
                            <i class="fas fa-truck text-white"></i>
                        </span>

                        <div>
                            <p class="text-lime-600 text-md font-bold">Shipments are made to all America (except Chile)!
                            </p>
                            <p class="text-lime-600 text-sm">
                                Receive it between {{ now()->addDay(7)->format('l, F j ') }} and
                                {{ now()->addDay(17)->format('l, F j ') }}
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Opciones de stock --}}
                @if ($product->subcategory->size)
                    @livewire('add-cart-item-size', ['product' => $product])
                @elseif ($product->subcategory->color)
                    @livewire('add-cart-item-color', ['product' => $product])
                @else
                    @livewire('add-cart-item', ['product' => $product])
                @endif

            </div>

        </div>
    </div>

    @push('script')
        <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>
        <script>
            ClassicEditor
                .create(document.querySelector('#editor'), {
                    toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'],
                })
                .catch(error => {
                    console.log(error);
                });
        </script>

        <script>
            $(document).ready(function() {
                $('.flexslider').flexslider({
                    animation: "slide",
                    controlNav: "thumbnails"
                });
            });
        </script>
    @endpush

</x-app-layout>
