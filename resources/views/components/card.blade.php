<div
    {{ $attributes->merge(['class' => 'w-5/6 p-4 bg-white rounded-lg border shadow-md sm:p-8 lg:w-2/5 dark:bg-gray-800 dark:border-gray-700']) }}>
    {{-- card heading --}}
    <div class="flex justify-between items-center mb-4 gap-3 ">
        <h5 class=" text-xl font-bold leading-none text-gray-900 dark:text-white">{{ $title }}</h5>
        <div>{{ $actions }}</div>

    </div>

    {{-- card body --}}
    <div class="flow-root">
        {{ $slot }}
    </div>

    <!-- Simplicity is the essence of happiness. - Cedric Bledsoe -->
</div>
