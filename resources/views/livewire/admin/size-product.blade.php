<div>
    <div class="bg-white shadow-lg my-8 rounded-lg p-6">
        <div>
            <x-jet-label class="mb-2" value="Size" />
            <x-jet-input wire:model="name" type="text" placeholder="Enter a size..." class="w-full" />
            <x-jet-input-error class="mt-2 text-xs font-semibold" for="name" />
        </div>

        <div class="flex justify-end items-center mt-4">
            <x-jet-button wire:click="save" wire:loading.attr="disabled" wire:target="save">
                Add size
            </x-jet-button>
        </div>
    </div>

    <ul class="space-y-4">
        @foreach ($sizes as $size)
            <li class="bg-white shadow-lg rounded-lg p-4" wire:key="size-{{ $size->id }}">
                <div class="flex items-center">
                    <span class="text-lg text-gray-700">{{ $size->name }}</span>
                    <div class="ml-auto">
                        <x-jet-button wire:click="edit({{ $size->id }})">
                            <i class="fas fa-edit"></i>
                        </x-jet-button>
                        <x-jet-danger-button wire:click="$emit('deleteSize', {{ $size->id }})">
                            <i class="fas fa-trash"></i>
                        </x-jet-danger-button>
                    </div>
                </div>
                @livewire('admin.color-size', ['size' => $size], key('color-size' . $size->id))
            </li>
        @endforeach
    </ul>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Edit size
        </x-slot>

        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label class="mb-2" value="Size" />
                <x-jet-input type="text" wire:model="name_edit" class="w-full" />
                <x-jet-input-error class="mt-2 text-xs font-semibold" for="name_edit" />
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
