<div class="container my-4 grid grid-cols-5 gap-5">

    <div class="col-span-3">

        <p class="mb-3 text-lg text-gray-700 font-semibold">Contact data</p>

        <div class="bg-white rounded-lg shadow p-4">
            <div class="mb-3">
                <x-jet-label value="Receptor" class="mb-2" />
                <x-jet-input type="text" placeholder="Name of the person who will receive the product..." class="w-full" />
            </div>

            <div class="mb-3">
                <x-jet-label value="Cellphone number" class="mb-2" />
                <x-jet-input type="text" placeholder="Enter a cellphone number to be in touch..." class="w-full" />
            </div>
        </div>

        <div>
            <p class="mt-6 mb-3 text-lg text-gray-700 font-semibold">Shipment data</p>

            <label class="bg-white rounded-lg shadow p-4 mt-3 flex items-center gap-3">
                <input type="radio" name="shipment" class="text-gray-600">
                <span class="text-sm text-gray-700">Pick up in store (124 Conch Street)</span>
                <span class="font-semibold text-gray-800 ml-auto">Free!</span>
            </label>

           <div class="bg-white rounded-lg shadow">
                <label class="p-4 mt-3 flex items-center gap-3">
                    <input type="radio" name="shipment" class="text-gray-600">
                    <span class="text-sm text-gray-700">Home delivery</span>
                </label>

                <hr class="pb-3">

                <div class="px-4 pb-4 grid grid-cols-2 gap-5">

                    {{-- Departamentos --}}
                    <div>
                        <x-jet-label class="mb-2" value="Department" />
                        <select class="input-control w-full" wire:model="department_id">
                            <option disabled selected value="">Select a department</option>
                            @foreach ($departments as $department)
                                <option class="capitalize" value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Ciudades --}}
                    <div>
                        <x-jet-label class="mb-2" value="City" />
                        <select class="input-control w-full" wire:model="city_id">
                            <option disabled selected value="">Select a city</option>
                            @foreach ($cities as $city)
                                <option class="capitalize" value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Distritos --}}
                    <div>
                        <x-jet-label class="mb-2" value="District" />
                        <select class="input-control w-full" wire:model="district_id">
                            <option disabled selected value="">Select a district</option>
                            @foreach ($districts as $district)
                                <option class="capitalize" value="{{ $district->id }}">{{ $district->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Dirección --}}
                    <div>
                        <x-jet-label class="mb-2" value="Direction" />
                        <x-jet-input class="input-control w-full" type="text" wire:model="adress" />
                    </div>

                    {{-- Dirección --}}
                    <div class="col-span-2">
                        <x-jet-label class="mb-2" value="Reference" />
                        <x-jet-input class="input-control w-full" type="text" wire:model="reference" />
                    </div>

                </div>
           </div>

        </div>

        <div>
            <x-jet-button class="my-3">
                Continue
            </x-jet-button>

            <hr>

            <p class="text-xs p-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium ipsam expedita, doloremque unde quaerat corrupti voluptates accusamus ea! Quisquam voluptas excepturi molestias facilis libero ut suscipit molestiae totam maxime et?
                <a class="text-orange-500 font-semibold underline" href="#">Terms and conditions</a>
            </p>
        </div>

    </div>

    <div class="col-span-2">
        <p class="mb-3 text-lg text-gray-700 font-semibold">Your shopping cart</p>

        <div class="bg-white rounded-lg shadow p-4">
            <ul>
                @forelse (Cart::content() as $item)
                    <li class="flex p-2 border-b border-gray-200">
                        <img class="h-15 w-20 object-cover object-center mr-3" src="{{ $item->options->image }}" alt="">
                        <article class="flex-1">
                            <h1 class="text-md font-bold">{{ $item->name }}</h1>
                            <div class="flex">
                                <p class="text-sm">Quantity: {{ $item->qty }} </p>
                                @isset($item->options['color'])
                                    <p class="ml-1 text-sm">- Color: {{ $item->options->color }}</p>
                                @endisset
                                @isset($item->options['size'])
                                    <p class="ml-1 text-sm">- Size: {{ $item->options->size }}</p>
                                @endisset
                            </div>
                            <p class="text-sm">USD: ${{ $item->price }}</p>
                        </article>
                    </li>
                @empty
                    <li class="py-6 px-4">
                        <p class="text-center text-gray-700">
                            You have no products added to your cart!
                        </p>
                    </li>
                @endforelse
            </ul>

            <div class="text-gray-700 mt-3">
                <p class="flex justify-between items-center">Subtotal: <span class="font-semibold">${{ Cart::subtotal() }}</span> </p>
                <p class="flex justify-between items-center">Shipment: <span class="font-semibold">Free</span> </p>
            </div>

            <hr class="my-3">

            <p class="flex justify-between items-center text-gray-700 font-bold">Total: <span class="font-semibold">${{ Cart::subtotal() }}</span> </p>

        </div>
    </div>

</div>
