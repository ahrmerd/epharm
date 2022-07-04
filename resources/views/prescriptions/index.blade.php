<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Prescription
        </h2>
        <a href="{{ route('prescriptions.create') }}">
            <button class="px-3 py-2 border rounded-lg hover:bg-slate-600 hover:text-white">Add Prescription</button>
        </a>
        @if (request()->route()->getName() == 'prescriptions.index')
            <a href="{{ route('prescriptions.user') }}">
                <button class="px-3 py-2 border rounded-lg hover:bg-slate-600 hover:text-white">My Prescriptions</button>
            </a>
        @else
            <a href="{{ route('prescriptions.index') }}">
                <button class="px-3 py-2 border rounded-lg hover:bg-slate-600 hover:text-white">All
                    Prescriptions</button>
            </a>
        @endif
    </x-slot>
    <div class="container mx-auto">
        <form action="" class="flex items-center justify-center mt-4">
            <input type="text" name="search" placeholder="search" class="rounded">
            <button>
                <svg xmlns="http://www.w3.org/2000/svg" height="48" width="48">
                    <path
                        d="M39.8 41.95 26.65 28.8q-1.5 1.3-3.5 2.025-2 .725-4.25.725-5.4 0-9.15-3.75T6 18.75q0-5.3 3.75-9.05 3.75-3.75 9.1-3.75 5.3 0 9.025 3.75 3.725 3.75 3.725 9.05 0 2.15-.7 4.15-.7 2-2.1 3.75L42 39.75Zm-20.95-13.4q4.05 0 6.9-2.875Q28.6 22.8 28.6 18.75t-2.85-6.925Q22.9 8.95 18.85 8.95q-4.1 0-6.975 2.875T9 18.75q0 4.05 2.875 6.925t6.975 2.875Z" />
                </svg>
            </button>
        </form>

        <div class="patients w-10/12 mx-auto">
            @if ($prescriptions->isEmpty())
                <div class=" mt-10 flex flex-col items-center justify-center">
                    <p>There are no prescriptions yet, let's add the first one!</p>
                    <a href="">
                        <button
                            class="px-3 py-2 border border-green-500 text-green-500 rounded-lg hover:bg-slate-600 hover:text-white">Add
                            Prescription
                        </button>
                    </a>
                </div>
            @else
                <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach ($prescriptions as $prescription)
                        <li class="py-3 sm:py-4">
                            <div class="flex items-center space-x-4">

                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                        Patient Name: {{ $prescription->patient->full_name }}

                                    </p>
                                    <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                        Diagnosis: {{ $prescription->diagnosis }}
                                    </p>
                                    <p class="text-sm text-gray-900 truncate dark:text-gray-400">
                                        Pharmacist involved: {{ $prescription->pharmacist->username }}
                                    </p>

                                    <p class="text-sm text-gray-900 truncate dark:text-gray-400">
                                        Doctor involved: {{ $prescription->doctor->username }}
                                    </p>

                                </div>
                                <a href="{{ route('prescriptions.show', $prescription->id) }}"> view </a>
                            </div>
                        </li>
                    @endforeach
                </ul>
                {{ $prescriptions->links() }}
            @endif

        </div>
    </div>
</x-app-layout>
