<x-app-layout>

    @php
        // SDK de Mercado Pago
        require base_path('/vendor/autoload.php');
        // Agrega credenciales
        MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));

        // Crea un objeto de preferencia
        $preference = new MercadoPago\Preference();

        // Crea un ítem en la preferencia
        foreach ($items as $product) {
            $item = new MercadoPago\Item();
            $item->title = $product->name;
            $item->quantity = $product->qty;
            $item->unit_price = $product->price;
            $products[] = $item;
        }

        $preference->items = $products;
        $preference->save();
    @endphp

    <div class="container my-3">
        <div class="bg-white rounded-lg shadow-lg p-3">
            <p class="text-gray-700 uppercase">Order<span class="font-semibold"> #{{ $order->id }} </span></p>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-3 my-4">
            <div class="grid grid-cols-2 gap-5 text-gray-700">
                <div>
                    <p class="font-bold uppercase mb-2">Shipment</p>
                    @if ($order->shipping_type == 1)
                        <p class="text-sm">Products must be picked up in store</p>
                        <p class="text-sm italic">124 Conch Street</p>
                    @else
                        <p class="text-sm">Products will be sent to:</p>
                        <p class="text-sm italic">{{ $order->adress }}</p>
                        <p class="text-sm italic">{{ $order->department->name }} - {{ $order->city->name }} - {{ $order->district->name }}</p>
                    @endif
                </div>
                <div>
                    <p class="font-bold uppercase mb-2">Contact data</p>
                    <p class="text-sm">Person who will receive the order: {{ $order->contact }}</p>
                    <p class="text-sm">Contact phone: {{ $order->phone }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-3 text-gray-700">
            <p class="font-bold uppercase mb-2">Resume</p>

            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    @foreach ($items as $item)
                        <tr>
                            <td>
                                <div class="flex items-center">
                                    <img class="h-14 w-20 object-cover object-center mr-3" src="{{ $item->options->image }}" alt="">
                                    <div>
                                        <p>{{ $item->name }}</p>
                                        @isset($item->options->color)
                                            <p class="text-xs">Color: {{ $item->options->color }}</p>
                                        @endisset
                                        @isset($item->options->size)
                                            <p class="text-xs">Size: {{ $item->options->size }}</p>
                                        @endisset
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">
                                ${{ $item->price }}
                            </td>
                            <td class="text-center">
                                {{ $item->qty }}
                            </td>
                            <td class="text-center">
                                ${{ $item->price * $item->qty }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="bg-white rounded-lg shadow-lg mt-4 p-5 flex justify-between items-center">
            <img class="h-16" src="{{ asset('formas-pago.png') }}" alt="Imagen medios de pago">
            <div class="text-gray-700">
                <p class="text-sm text-right">Subtotal: ${{ $order->total }}</p>
                <p class="text-sm text-right">Shipment: ${{ $order->shipping_cost }}</p>
                <p class="text-lg font-bold uppercase text-right">Total: ${{ $order->shipping_cost + $order->total }}</p>

                <div class="cho-container">

                </div>

            </div>
        </div>
    </div>

    {{-- SDK MercadoPago.js V2 --}}
    <script src="https://sdk.mercadopago.com/js/v2"></script>

    <script>
        // Agrega credenciales de SDK
        const mp = new MercadoPago("{{config('services.mercadopago.key')}}", {
          locale: "es-AR",
        });

        // Inicializa el checkout
        mp.checkout({
          preference: {
            id: "{{$preference->id}}",
          },
          render: {
            container: ".cho-container", // Indica el nombre de la clase donde se mostrará el botón de pago
            label: "Pagar", // Cambia el texto del botón de pago (opcional)
          },
        });
      </script>

</x-app-layout>
