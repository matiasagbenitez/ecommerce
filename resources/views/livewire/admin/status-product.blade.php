<div class="bg-white shadow-xl p-6 rounded-lg mb-4">
    <div class="flex items-center justify-between">
        <p class="text-lg text-gray-700 text-center font-semibold">Product status</p>

        <div>
            <label class="mr-6">
                <input type="radio" wire:model.defer="status" name="status" value="1">
                Draft
            </label>
            <label>
                <input type="radio" wire:model.defer="status" name="status" value="2">
                Published
            </label>
        </div>

        <div class="flex items-center">
            <x-jet-action-message class="mr-3" on="saved">
                Updated!
            </x-jet-action-message>

            <x-jet-button wire:click="save" wire:loading.attr="disabled" wire:target="save">
                Update
            </x-jet-button>
        </div>
    </div>
</div>
