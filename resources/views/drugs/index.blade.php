<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Drugs
        </h2>
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        @if (session('delete-message'))
            <div class=" text-xs text-red-500">
                {{ session('delete-message') }}
            </div>
        @endif
    </x-slot>
    <div class="container">

        <form class=" max-w-sm m-auto mt-4"
            action="{{ $mode == 'edit' ? route('drugs.update', $drug->id) : route('drugs.store') }}" method="POST">
            @if ($mode == 'edit')
                @method('PUT')
                <h2>Update Drug</h2>
            @else
                <h2>Add a new Drug</h2>
            @endif


            @csrf
            <!-- drug name -->
            <div class="mt-4">
                <x-label for="name" value="Drug Name" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $drug->name)" required />
            </div>

            <!-- drug brand -->
            <div class="mt-4">
                <x-label for="brand" value="Drug Brand" />
                <x-input id="brand" class="block mt-1 w-full" type="text" name="brand" :value="old('brand', $drug->brand)" />
            </div>

            <!-- drug size -->
            <div class="mt-4">
                <x-label for="size" value="Drug Size" />
                <x-input placeholder="e.g 500mg" id="size" class="block mt-1 w-full" type="text" name="size"
                    :value="old('size', $drug->size)" required />
            </div>

            <x-button class="mt-4">
                @if ($mode == 'edit')
                    Update
                @else
                    Add
                @endif
            </x-button>
        </form>


        <form action="" class="flex items-center justify-center mt-4">
            <input type="text" name="search" placeholder="search" class="rounded">
            <button>
                <svg xmlns="http://www.w3.org/2000/svg" height="48" width="48">
                    <path
                        d="M39.8 41.95 26.65 28.8q-1.5 1.3-3.5 2.025-2 .725-4.25.725-5.4 0-9.15-3.75T6 18.75q0-5.3 3.75-9.05 3.75-3.75 9.1-3.75 5.3 0 9.025 3.75 3.725 3.75 3.725 9.05 0 2.15-.7 4.15-.7 2-2.1 3.75L42 39.75Zm-20.95-13.4q4.05 0 6.9-2.875Q28.6 22.8 28.6 18.75t-2.85-6.925Q22.9 8.95 18.85 8.95q-4.1 0-6.975 2.875T9 18.75q0 4.05 2.875 6.925t6.975 2.875Z" />
                </svg>
            </button>
        </form>

        <table class="custom-table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>drug name</th>
                    <th>brand name</th>
                    <th>size</th>
                    <th>actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($drugs as $drug)
                    <tr>
                        <td>
                            {{ $drug->id }}
                        </td>
                        <td>
                            {{ $drug->name }}
                        </td>
                        <td>
                            {{ $drug->brand }}
                        </td>
                        <td>
                            {{ $drug->size }}
                        </td>
                        <td class="flex">
                            <a href="{{ route('drugs.edit', $drug->id) }}">
                                <svg class="scale-50 fill-orange-500" xmlns="http://www.w3.org/2000/svg" height="48"
                                    width="48">
                                    <path
                                        d="M9 39h2.2l22.15-22.15-2.2-2.2L9 36.8Zm30.7-24.3-6.4-6.4 2.1-2.1q.85-.85 2.1-.85t2.1.85l2.2 2.2q.85.85.85 2.1t-.85 2.1Zm-2.1 2.1L12.4 42H6v-6.4l25.2-25.2Zm-5.35-1.05-1.1-1.1 2.2 2.2Z" />
                                </svg>
                            </a>

                            <form action="{{ route('drugs.destroy', $drug->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit">
                                    <svg class=" scale-50 fill-red-500" xmlns="http://www.w3.org/2000/svg" height="48"
                                        width="48">
                                        <path
                                            d="M13.05 42q-1.2 0-2.1-.9-.9-.9-.9-2.1V10.5H8v-3h9.4V6h13.2v1.5H40v3h-2.05V39q0 1.2-.9 2.1-.9.9-2.1.9Zm21.9-31.5h-21.9V39h21.9Zm-16.6 24.2h3V14.75h-3Zm8.3 0h3V14.75h-3Zm-13.6-24.2V39Z" />
                                    </svg>
                                </button>
                            </form>

                        </td>
                    </tr>
                @endforeach
                <tr></tr>
            </tbody>

        </table>
        {{ $drugs->links() }}

    </div>
</x-app-layout>
