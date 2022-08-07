<x-app-layout>

    <div class="container py-5">
        @foreach ($categories as $category)
            <section class="mb-6">
                {{-- Nombre categoría --}}
                <a href="{{ route('categories.show', $category) }}">
                    <h1 class="text-lg uppercase font-semibold text-neutral-700 hover:text-orange-500 hover:underline mb-2">{{ $category->name }}</h1>
                </a>

                {{-- Carrusel --}}
                @livewire('category-products', ['category' => $category])
            </section>
        @endforeach
    </div>

    @push('script')
        <script>

            Livewire.on('glider', function(id) {
                new Glider(document.querySelector('.glider-' + id), {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    draggable: true,
                    dots: '.glider-' + id + '~ .dots',
                    arrows: {
                        prev: '.glider-' + id + '~ .glider-prev',
                        next: '.glider-' + id + '~ .glider-next'
                    },
                    responsive: [
                        {
                            breakpoint: 640,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 1,
                            }
                        },
                        {
                            breakpoint: 768,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 2,
                            }
                        },
                        {
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 4,
                                slidesToScroll: 3,
                            }
                        },
                        {
                            breakpoint: 1240,
                            settings: {
                                slidesToShow: 5,
                                slidesToScroll: 4,
                            }
                        }
                    ]
                });
            });

        </script>
    @endpush

</x-app-layout>
