<x-app-layout>

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 my-4">

        {{-- Status --}}
        <div class="bg-white rounded-lg shadow-lg pt-6 px-6 pb-9 my-4 flex items-center">
            <div class="relative">
                <div class="{{ ($order->status >= 2 && $order->status != 5) ? 'bg-green-600' : 'bg-gray-400'}} rounded-full h-12 w-12 flex items-center justify-center">
                    <i class="fas fa-check text-white"></i>
                </div>
                <div class="flex justify-center"><p class="text-gray-500 text-xs absolute mt-1">Paid</p></div>
            </div>

            <div class="{{ ($order->status >= 3 && $order->status != 5) ? 'bg-green-600' : 'bg-gray-400'}} h-1 flex-1 mx-2"></div>

            <div class="relative">
                <div class="{{ ($order->status >= 3 && $order->status != 5) ? 'bg-green-600' : 'bg-gray-400'}} rounded-full h-12 w-12 flex items-center justify-center">
                    <i class="fas fa-truck text-white"></i>
                </div>
                <div class="flex justify-center"><p class="text-gray-500 text-xs absolute mt-1">Shipped</p></div>
            </div>

            <div class="{{ ($order->status >= 4 && $order->status != 5) ? 'bg-green-600' : 'bg-gray-400'}} h-1 flex-1 mx-2"></div>

            <div class="relative">
                <div class="{{ ($order->status >= 4 && $order->status != 5) ? 'bg-green-600' : 'bg-gray-400'}} rounded-full h-12 w-12 flex items-center justify-center">
                    <i class="fas fa-check text-white"></i>
                </div>
                <div class="flex justify-center"><p class="text-gray-500 text-xs absolute mt-1">Delivered</p></div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-3 flex items-center justify-between">
            <p class="text-gray-700 uppercase">Order<span class="font-semibold"> #{{ $order->id }} </span></p>
            @if ($order->status == 1)
                <a href="{{ route('orders.payment', $order) }}">
                    <x-jet-secondary-button class="px-5 bg-orange-500 border-orange-500 text-white font-bold hover:text-white hover:bg-orange-600">
                        Go pay
                    </x-jet-secondary-button>
                </a>
            @endif
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

    </div>

</x-app-layout>
