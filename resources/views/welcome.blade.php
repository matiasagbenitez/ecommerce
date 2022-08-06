<x-app-layout>

    <div class="container py-5">
        <section>
            {{-- Nombre categoría --}}
            <h1 class="text-lg uppercase font-semibold text-neutral-700 mb-2">{{ $categories->first()->name }}</h1>

            {{-- Carrusel --}}
            @livewire('category-products', ['category' => $categories->first()])
        </section>
    </div>

    <script>
        new Glider(document.querySelector('.glider'), {
            slidesToShow: 5,
            slidesToScroll: 5,
            draggable: true,
            dots: '.dots',
            arrows: {
                prev: '.glider-prev',
                next: '.glider-next'
            }
        });
    </script>
</x-app-layout>
