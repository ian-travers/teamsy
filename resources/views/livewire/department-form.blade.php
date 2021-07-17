<div>
    <input wire:model="name" type="text" class="rounded-md">
    <button wire:click="submit" class="bg-blue-500 rounded-md text-white px-4 py-2">Save</button>
    @if($success)
        <div class="mt-1 text-xs text-green-500">Saved.</div>
    @endif
</div>
