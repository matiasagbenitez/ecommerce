<x-admin-layout>

        <div class="container my-4">

            <h1 class="font-bold text-gray-700 uppercase my-4">Orders</h1>

            <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 text-white">

                <a href="{{ route('admin.orders.index') . "?status=2" }}" class="bg-gray-500 bg-opacity-75 rounded-lg p-6 hover:cursor-pointer">
                    <p class="text-center text-xl">{{ $pagado }}</p>
                    <p class="text-center uppercase">Paid</p>
                    <p class="text-center text-xl mt-2 uppercase">
                        <i class="fas fa-credit-card"></i>
                    </p>
                </a>

                <a href="{{ route('admin.orders.index') . "?status=3" }}" class="bg-yellow-500 bg-opacity-75 rounded-lg p-6 hover:cursor-pointer">
                    <p class="text-center text-xl">{{ $enviado }}</p>
                    <p class="text-center uppercase">Shipped</p>
                    <p class="text-center text-xl mt-2 uppercase">
                        <i class="fas fa-truck"></i>
                    </p>
                </a>

                <a href="{{ route('admin.orders.index') . "?status=4" }}" class="bg-indigo-500 bg-opacity-75 rounded-lg p-6 hover:cursor-pointer">
                    <p class="text-center text-xl">{{ $entregado }}</p>
                    <p class="text-center uppercase">Delivered</p>
                    <p class="text-center text-xl mt-2 uppercase">
                        <i class="fas fa-check-circle"></i>
                    </p>
                </a>

                <a href="{{ route('admin.orders.index') . "?status=5" }}" class="bg-green-500 bg-opacity-75 rounded-lg p-6 hover:cursor-pointer">
                    <p class="text-center text-xl">{{ $anulado }}</p>
                    <p class="text-center uppercase">Canceled</p>
                    <p class="text-center text-xl mt-2 uppercase">
                        <i class="fas fa-times-circle"></i>
                    </p>
                </a>
            </section>

            @if ($orders->count())
                <section class="bg-white shadow-lg rounded-lg my-8 p-6 text-gray-700">
                    <h1 class="uppercase text-lg mb-3">Recent orders</h1>
                    <ul>
                        @foreach ($orders as $order)
                            <li>
                                <a href="{{ route('admin.orders.show', $order) }}" class="p-2 hover:bg-gray-100 flex items-center border-t">
                                    {{-- Íconos --}}
                                    <span class="w-12 text-center">
                                        @switch($order->status)
                                            @case(1)
                                                <i class="fas fa-business-time text-red-500 text-opacity-75"></i>
                                                @break
                                            @case(2)
                                                <i class="fas fa-credit-card text-gray-500 text-opacity-75"></i>
                                                @break
                                            @case(3)
                                                <i class="fas fa-truck text-yellow-500 text-opacity-75"></i>
                                                @break
                                            @case(4)
                                                <i class="fas fa-check-circle text-indigo-500 text-opacity-75"></i>
                                                @break
                                            @case(5)
                                                <i class="fas fa-times-circle text-green-500 text-opacity-75"></i>
                                                @break
                                            @default

                                        @endswitch
                                    </span>
                                    {{-- Detalles --}}
                                    <span class="text-sm">Order #{{$order->id}}
                                        <br>
                                        <span class="text-xs italic">{{ $order->created_at->diffForHumans() }}</span>
                                    </span>
                                    <div class="ml-auto w-24">
                                        <span class="font-bold">
                                            @switch($order->status)
                                                @case(1)
                                                    Pending
                                                    @break
                                                @case(2)
                                                    Paid
                                                    @break
                                                @case(3)
                                                    Shipped
                                                    @break
                                                @case(4)
                                                    Delivered
                                                    @break
                                                @case(5)
                                                    Canceled
                                                    @break
                                                @default

                                            @endswitch
                                        </span>
                                        <br>
                                        <span class="text-sm">
                                            ${{ $order->total }}
                                        </span>
                                    </div>
                                    <span>
                                        <i class="fas fa-angle-right ml-6"></i>
                                    </span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    {{ $orders->links() }}
                </section>
            @else
                <div class="bg-white shadow-lg rounded-lg my-8 p-6 text-gray-700">
                    <p class="text-center">There are no purchase orders!</p>
                </div>
            @endif

        </div>

</x-admin-layout>
