<x-app-layout>
    <div class="container py-6">
        <div class="grid grid-cols-2 gap-6">

            <div>
                <div class="flexslider">
                    <ul class="slides">
                        @foreach ($product->image as $image)
                            <li data-thumb="{{ asset('storage/' . $image->url) }}">
                                <img src="{{ asset('storage/' . $image->url) }}" alt="">
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div>
                <h1 class="text-3xl font-bold text-gray-500 mb-3">{{ $product->name }}</h1>
                <div class="flex justify-between items-center my-2">
                    <div>
                        <p class="text-sm">Brand:
                            <a class="text-orange-500 hover:underline hover:font-bold capitalize" href="#">{{ $product->brand->name }}</a>
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
                            <p class="text-lime-600 text-md font-bold">Shipments are made to all America (except Chile)!</p>
                            <p class="text-lime-600 text-sm">
                                Receive it between {{ now()->addDay(7)->format('l, F j ')}} and {{ now()->addDay(17)->format('l, F j ')}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @push('script')
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
