<div x-data="{ 'edit': false }" @finished.window="edit = false">
    <span class=" font-bold"> {{ $varName }}: </span>
    <span x-show='!edit'> {{ $varVal }} </span>
    <input x-show='edit' type="text" wire:model="newVal">
    <span x-show='!edit' x-on:click="edit=true" class=" underline text-blue-500 cursor-pointer">Edit</span>
    <span x-show='edit' x-on:click="$wire.save()" class=" underline text-blue-500 cursor-pointer">Save</span>
    <span x-show='edit' x-on:click="$wire.cancel()" class=" underline text-blue-500 cursor-pointer">Cancel</span>
    {{-- Nothing in the world is as soft and yielding as water. --}}
</div>
