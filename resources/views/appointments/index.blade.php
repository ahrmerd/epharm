<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Appointments
        </h2>
        <a href="{{ route('appointments.create') }}">
            <button class="px-3 py-2 border rounded-lg hover:bg-slate-600 hover:text-white">Add Appointment</button>
        </a>
        @if (route('appointments.index') ==
            route(
                request()->route()->getName()))
            <a href="{{ route('appointments.user') }}">
                <button class="px-3 py-2 border rounded-lg hover:bg-slate-600 hover:text-white">My Appointments</button>
            </a>
        @else
            <a href="{{ route('appointments.index') }}">
                <button class="px-3 py-2 border rounded-lg hover:bg-slate-600 hover:text-white">All Appointments</button>
            </a>
        @endif
    </x-slot>
    <div class="container m-auto">
        <form action="" class="flex items-center justify-center mt-4">
            <input type="text" name="search" placeholder="search" class="rounded">
            <button>
                <svg xmlns="http://www.w3.org/2000/svg" height="48" width="48">
                    <path
                        d="M39.8 41.95 26.65 28.8q-1.5 1.3-3.5 2.025-2 .725-4.25.725-5.4 0-9.15-3.75T6 18.75q0-5.3 3.75-9.05 3.75-3.75 9.1-3.75 5.3 0 9.025 3.75 3.725 3.75 3.725 9.05 0 2.15-.7 4.15-.7 2-2.1 3.75L42 39.75Zm-20.95-13.4q4.05 0 6.9-2.875Q28.6 22.8 28.6 18.75t-2.85-6.925Q22.9 8.95 18.85 8.95q-4.1 0-6.975 2.875T9 18.75q0 4.05 2.875 6.925t6.975 2.875Z" />
                </svg>
            </button>
        </form>

        <div class="appointments">
            @if ($appointments->isEmpty())
                <div class=" mt-10 flex flex-col items-center justify-center">
                    <p>There are no appointments yet, add the first one!</p>
                    <a href="{{ route('appointments.create') }}">
                        <button
                            class="px-3 py-2 border border-green-500 text-green-500 rounded-lg hover:bg-slate-600 hover:text-white">Add
                            appointment
                        </button>
                    </a>
                </div>
            @else
                <table class="responsive-table">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>User</th>
                            <th>Patient Name</th>
                            <th>Date and Time</th>
                            <th>Status</th>
                            <th>reason</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($appointments as $appointment)
                            <tr>
                                <td data-label="id">
                                    appointment--{{ $appointment->id }}
                                </td>
                                <td data-label="user">
                                    {{ $appointment->user->username }} - {{ $appointment->user->getUserType() }}
                                </td>
                                <td data-label="Patient Name">
                                    {{ $appointment->patient->full_name }}
                                </td>
                                <td data-label="date and time">
                                    {{ \Carbon\Carbon::parse($appointment->date_time)->format('d-m-y h:i A') }}</p>
                                </td>
                                <td data-label="Status">
                                    {{ $appointment->getAppointmentStatus() }}
                                </td>
                                <td data-label="reason" class="truncate">
                                    {{ $appointment->reason }}
                                </td>
                                <td class="">
                                    @can('view', $appointment)
                                        <a href="{{ route('appointments.show', $appointment->id) }}">
                                            <svg class="scale-50 fill-blue-400" xmlns="http://www.w3.org/2000/svg"
                                                height="48" width="48">
                                                <path
                                                    d="M9 42q-1.25 0-2.125-.875T6 39V9q0-1.25.875-2.125T9 6h30q1.25 0 2.125.875T42 9v30q0 1.25-.875 2.125T39 42Zm0-3h30V13H9v26Zm15-5.25q-4 0-7.15-2.15-3.15-2.15-4.6-5.6 1.45-3.45 4.6-5.6Q20 18.25 24 18.25t7.15 2.15q3.15 2.15 4.6 5.6-1.45 3.45-4.6 5.6Q28 33.75 24 33.75Zm0-2.5q2.85 0 5.25-1.4T33 26q-1.35-2.45-3.75-3.85T24 20.75q-2.85 0-5.25 1.4T15 26q1.35 2.45 3.75 3.85t5.25 1.4Zm0-2.75q-1.05 0-1.775-.725Q21.5 27.05 21.5 26q0-1.05.725-1.775Q22.95 23.5 24 23.5q1.05 0 1.775.725.725.725.725 1.775 0 1.05-.725 1.775-.725.725-1.775.725Z" />
                                            </svg>
                                        </a>
                                    @endcan

                                </td>
                            </tr>
                        @endforeach
                        <tr></tr>
                    </tbody>

                </table>
                {{-- {{ $appointments->links() }} --}}
            @endif

        </div>
    </div>
</x-app-layout>
