<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            Scaffold
        </h2>
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
    </x-slot>
</x-app-layout>
