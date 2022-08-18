<div>
    {{-- @php
        // SDK de Mercado Pago
        require base_path('/vendor/autoload.php');
        // Agrega credenciales
        MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));

        // Crea un objeto de preferencia
        $preference = new MercadoPago\Preference();

        $shipments = new MercadoPago\Shipments();
        $shipments->cost = $order->shipping_cost;
        $shipments->mode = 'not_specified';

        $preference->shipments = $shipments;

        // Crea un ítem en la preferencia
        foreach ($items as $product) {
            $item = new MercadoPago\Item();
            $item->title = $product->name;
            $item->quantity = $product->qty;
            $item->unit_price = $product->price;
            $products[] = $item;
        }

        $preference->back_urls = [
            'success' => route('orders.pay', $order),
            'failure' => 'http://www.tu-sitio/failure',
            'pending' => 'http://www.tu-sitio/pending',
        ];
        $preference->auto_return = 'approved';

        $preference->items = $products;
        $preference->save();
    @endphp --}}

    <div class="container my-3 grid grid-cols-1 lg:grid-cols-5 gap-5">

        <div class="lg:col-span-3">
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
                            <p class="text-sm italic">{{ $shipping_data->adress }}</p>
                            <p class="text-sm italic">{{ $shipping_data->department }} - {{ $shipping_data->city }} -
                                {{ $shipping_data->district }}</p>
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
                                        <img class="h-14 w-20 object-cover object-center mr-3"
                                            src="{{ $item->options->image }}" alt="">
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

            {{-- MERCADOPAGO --}}
            {{-- <div class="bg-white rounded-lg shadow-lg mt-4 p-3">
                <p class="font-bold text-gray-700 uppercase">Payment</p>
                <div class="flex justify-between items-center">
                    <img class="h-14" src="{{ asset('formas-pago.png') }}" alt="Imagen medios de pago">
                    <div class="text-gray-700 flex items-center gap-5">
                        <div>
                            <p class="text-xs text-right italic">Subtotal: ${{ $order->total - $order->shipping_cost }}</p>
                            <p class="text-xs text-right italic">Shipment: ${{ $order->shipping_cost }}</p>
                            <p class="text-lg font-bold uppercase text-right">Total: ${{ $order->shipping_cost + $order->total }}</p>
                        </div>
                        <div class="cho-container p-3">

                        </div>
                    </div>
                </div>
            </div> --}}
        </div>

        {{-- PAYPAL --}}
        <div class="lg:col-span-2">
            <div class="bg-white rounded-lg shadow-lg p-3">
                <p class="font-bold text-gray-700 uppercase">Payment</p>
                <div class="flex justify-between items-center mb-5">
                    <img class="h-14" src="{{ asset('visa-mastercard.png') }}" alt="Imagen medios de pago">
                    <div class="text-gray-700 flex items-center gap-5">
                        <div>
                            <p class="text-xs text-right italic">Subtotal: ${{ $order->total - $order->shipping_cost }}
                            </p>
                            <p class="text-xs text-right italic">Shipment: ${{ $order->shipping_cost }}</p>
                            <p class="text-lg font-bold uppercase text-right">Total:
                                ${{ $order->total }}</p>
                        </div>
                    </div>
                </div>
                <div id="paypal-button-container">
                    {{-- BTN PAYPAL --}}
                </div>
            </div>
        </div>

    </div>

    @push('script')
        {{-- SDK MercadoPago.js V2 --}}
        {{-- <script src="https://sdk.mercadopago.com/js/v2"></script>

        <script>
            // Agrega credenciales de SDK
            const mp = new MercadoPago("{{ config('services.mercadopago.key') }}", {
                locale: "es-AR",
            });

            // Inicializa el checkout
            mp.checkout({
                preference: {
                    id: "{{ $preference->id }}",
                },
                render: {
                    container: ".cho-container", // Indica el nombre de la clase donde se mostrará el botón de pago
                    label: "Pagar", // Cambia el texto del botón de pago (opcional)
                },
            });
        </script> --}}


        {{-- SDK PAYPAL --}}
        <script src="https://www.paypal.com/sdk/js?client-id={{ config('services.paypal.client_id') }}"></script>

        <script>
            paypal.Buttons({
                // Sets up the transaction when a payment button is clicked
                createOrder: (data, actions) => {
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                value: "{{ $order->total }}" // Can also reference a variable or function
                            }
                        }]
                    });
                },

                // Finalize the transaction after payer approval
                onApprove: (data, actions) => {
                    return actions.order.capture().then(function(orderData) {

                        Livewire.emit('payOrder');

                    });
                }
            }).render('#paypal-button-container');
        </script>
    @endpush

</div>
