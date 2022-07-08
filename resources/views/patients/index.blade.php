<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Patients
        </h2>
        <a href="{{ route('patients.create') }}">
            <button class="px-3 py-2 border rounded-lg hover:bg-slate-600 hover:text-white">Add Patient</button>
        </a>
    </x-slot>
    <div class="container">
        <form action="" class="flex items-center justify-center mt-4">
            <input type="text" name="search" placeholder="search" class="rounded">
            <button>run "php artisan serve"
                <svg xmlns="http://www.w3.org/2000/svg" height="48" width="48">
                    <path
                        d="M39.8 41.95 26.65 28.8q-1.5 1.3-3.5 2.025-2 .725-4.25.725-5.4 0-9.15-3.75T6 18.75q0-5.3 3.75-9.05 3.75-3.75 9.1-3.75 5.3 0 9.025 3.75 3.725 3.75 3.725 9.05 0 2.15-.7 4.15-.7 2-2.1 3.75L42 39.75Zm-20.95-13.4q4.05 0 6.9-2.875Q28.6 22.8 28.6 18.75t-2.85-6.925Q22.9 8.95 18.85 8.95q-4.1 0-6.975 2.875T9 18.75q0 4.05 2.875 6.925t6.975 2.875Z" />
                </svg>
            </button>
        </form>

        <div class="patients">
            @if ($patients->isEmpty())
                <div class=" mt-10 flex flex-col items-center justify-center">
                    <p>There are no patients yet, let's add the first one!</p>
                    <a href="">
                        <button
                            class="px-3 py-2 border border-green-500 text-green-500 rounded-lg hover:bg-slate-600 hover:text-white">Add
                            Patient
                        </button>
                    </a>
                </div>
            @else
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>first name</th>
                            <th>last name</th>
                            <th>gender</th>
                            <th>Date of Birth</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($patients as $patient)
                            <tr>
                                <td>
                                    Patient--{{ $patient->id }}
                                </td>
                                <td>
                                    {{ $patient->first_name }}
                                </td>
                                <td>
                                    {{ $patient->last_name }}
                                </td>
                                <td>
                                    {{ $patient->gender }}
                                </td>
                                <td>
                                    {{ $patient->birth_date }}
                                </td>
                                <td class="flex">
                                    <a href="{{ route('patients.show', $patient->id) }}">
                                        <svg class="scale-50 fill-blue-400" xmlns="http://www.w3.org/2000/svg"
                                            height="48" width="48">
                                            <path
                                                d="M9 42q-1.25 0-2.125-.875T6 39V9q0-1.25.875-2.125T9 6h30q1.25 0 2.125.875T42 9v30q0 1.25-.875 2.125T39 42Zm0-3h30V13H9v26Zm15-5.25q-4 0-7.15-2.15-3.15-2.15-4.6-5.6 1.45-3.45 4.6-5.6Q20 18.25 24 18.25t7.15 2.15q3.15 2.15 4.6 5.6-1.45 3.45-4.6 5.6Q28 33.75 24 33.75Zm0-2.5q2.85 0 5.25-1.4T33 26q-1.35-2.45-3.75-3.85T24 20.75q-2.85 0-5.25 1.4T15 26q1.35 2.45 3.75 3.85t5.25 1.4Zm0-2.75q-1.05 0-1.775-.725Q21.5 27.05 21.5 26q0-1.05.725-1.775Q22.95 23.5 24 23.5q1.05 0 1.775.725.725.725.725 1.775 0 1.05-.725 1.775-.725.725-1.775.725Z" />
                                        </svg>
                                    </a>

                                    <form action="{{ route('patients.destroy', $patient->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit">
                                            <svg class=" scale-50 fill-red-500" xmlns="http://www.w3.org/2000/svg"
                                                height="48" width="48">
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
                {{ $patients->links() }}
            @endif

        </div>
    </div>
</x-app-layout>
