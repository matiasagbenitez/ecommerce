<div class="mt-4">
    <div class="p-6 bg-gray-100 shadow-xl rounded-xl">

        {{-- COLOR --}}
        <div class="mb-4">
            <x-jet-label class="mb-2" value="Color" />
            <div class="flex gap-6">
                @foreach ($colors as $color)
                    <label>
                        <input wire:model.defer="color_id" type="radio" name="color_id" value="{{ $color->id }}">
                        <span class="capitalize ml-2">{{ $color->name }}</span>
                    </label>
                @endforeach
            </div>
            <x-jet-input-error class="mt-2 text-xs font-semibold" for="color_id" />
        </div>

        {{-- QUANTITY --}}
        <div class="mb-4">
            <x-jet-label class="mb-2" value="Quantity" />
            <x-jet-input type="number" wire:model.defer="quantity" placeholder="Enter the product available quantity..." class="w-full" />
            <x-jet-input-error class="mt-2 text-xs font-semibold" for="quantity" />
        </div>

        {{-- BOTÓN AGREGAR --}}
        <div class="col-span-2 flex justify-end items-center">
            <x-jet-action-message class="mr-3" on="saved">
                Color added!
            </x-jet-action-message>

            <x-jet-button
                wire:click="save"
                wire:target="save"
                wire:loading.attr="disabled">
                Add color
            </x-jet-button>
        </div>
    </div>

    @if ($size_colors->count())
        <div class="mt-4">
            <table>
                <thead>
                    <tr>
                        <th class="text-left px-4 py-2 w-1/2">Color</th>
                        <th class="text-left px-4 py-2 w-1/2">Quantity</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($size_colors as $size_color)
                        <tr wire:key="$product_color-{{ $size_color->pivot->id }}">
                            <td class="capitalize px-4 py-2">{{ $colors->find($size_color->pivot->color_id)->name }}</td>
                            <td class="px-4 py-2">{{ $size_color->pivot->quantity }} units</td>
                            <td class="ml-auto px-4 py-2 flex">
                                <x-jet-secondary-button class="ml-auto mr-2"
                                    wire:click="edit({{ $size_color->pivot->id }})"
                                    wire:loading.attr="disabled"
                                    wire:target="edit({{ $size_color->pivot->id }})">
                                    Update
                                </x-jet-secondary-button>

                                <x-jet-danger-button wire:click="$emit('deletePivot', {{ $size_color->pivot->id }})">
                                    Delete
                                </x-jet-danger-button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Edit color
        </x-slot>

        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label class="mb-2" value="Color" />
                <select wire:model="pivot_color_id" class="input-control w-full">
                    <option value="" selected disabled>Select a color</option>
                    @foreach ($colors as $color)
                        <option value="{{ $color->id }}">{{ Str::ucfirst($color->name) }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <x-jet-label class="mb-2" value="Quantity" />
                <x-jet-input wire:model="pivot_quantity" type="number" placeholder="Quantity..." class="w-full" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <div>
                <x-jet-danger-button wire:click="$set('open', false)">
                    Cancel
                </x-jet-danger-button>
                <x-jet-secondary-button wire:click="update" wire:loading.attr="disabled" wire:target="update">
                    Save changes
                </x-jet-secondary-button>
            </div>
        </x-slot>
    </x-jet-dialog-modal>

</div>
