<x-app-layout>

    <div class="container py-5">
        @foreach ($categories as $category)
            <section class="mb-6">
                {{-- Nombre categoría --}}
                <h1 class="text-lg uppercase font-semibold text-neutral-700 mb-2">{{ $category->name }}</h1>

                {{-- Carrusel --}}
                @livewire('category-products', ['category' => $category])
            </section>
        @endforeach
    </div>

    @push('script-glider')
        <script>

            Livewire.on('glider', function(id) {
                new Glider(document.querySelector('.glider-' + id), {
                    slidesToShow: 5,
                    slidesToScroll: 5,
                    draggable: true,
                    dots: '.dots',
                    arrows: {
                        prev: '.glider-prev',
                        next: '.glider-next'
                    }
                });
            });

        </script>
    @endpush

</x-app-layout>
