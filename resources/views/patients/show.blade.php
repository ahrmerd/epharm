<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold capitalize text-2xl text-gray-800 leading-tight">
            {{ $patient->full_name }}
        </h2>
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

    </x-slot>
    <div class="container m-auto border">

        {{-- basic information --}}
        <div class="section capitalize">
            <h3 class="basis-full font-bold">Patient Information</h3>
            <a class="basis-full font-bold" href="{{ route('patients.edit', $patient->id) }}">
                <button class="px-3 py-2 border rounded-lg hover:bg-slate-600 hover:text-white">Edit
                    Patient</button>
            </a>
            <div>
                <span class=" font-semibold">first name</span>
                <span>: {{ $patient->first_name }} </span>
            </div>
            <div>
                <span class=" font-semibold">last name</span>
                <span>: {{ $patient->last_name }} </span>
            </div>
            <div>
                <span class=" font-semibold">gender</span>
                <span>: {{ $patient->gender }} </span>
            </div>
            <div>
                <span class=" font-semibold">birth date</span>
                <span>: {{ $patient->birth_date }} </span>
            </div>
            <div>
                <span class=" font-semibold">blood group</span>
                <span>: {{ $patient->blood_group }} </span>
            </div>
            <div>
                <span class=" font-semibold">blood genotype</span>
                <span>: {{ $patient->blood_genotype }} </span>
            </div>
            <div>
                <span class=" font-semibold">allergies</span>
                <span>: {{ $patient->allergies }} </span>
            </div>
            <div>
                <span class=" font-semibold">email</span>
                <span style="text-transform: none">: {{ $patient->email }} </span>
            </div>
            <div>
                <span class=" font-semibold">phone</span>
                <span>: {{ $patient->phone }} </span>
            </div>
            <div class=" basis-full">
                <span class=" font-semibold">address</span>
                <span>: {{ $patient->address }} </span>
            </div>
        </div>


        {{-- appointments --}}
        <div class="section">
            <h3 class="basis-full font-bold">Patient Appointments</h3>
            <a class="basis-full font-bold"
                href="{{ route('appointments.create', ['patient_id' => $patient->id, 'user_id' => auth()->id()]) }}">
                <button class="px-3 py-2 border rounded-lg hover:bg-slate-600 hover:text-white">Make
                    Appointment With Patient</button>
            </a>
            <div class="appointments">
                @if ($patient->appointments->isEmpty())
                    <p>This patient has no appointments</p>
                @else
                    <table class="responsive-table">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>User</th>
                                <th>Date and Time</th>
                                <th>Status</th>
                                <th>reason</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($patient->appointments as $appointment)
                                <tr>
                                    <td data-label="id">
                                        appointment--{{ $appointment->id }}
                                    </td>
                                    <td data-label="user">
                                        {{ $appointment->user->username }} -
                                        {{ $appointment->user->getUserType() }}
                                    </td>
                                    <td data-label="date and time">
                                        {{ \Carbon\Carbon::parse($appointment->date_time)->format('d-m-y h:i A') }}
                                    </td>
                                    <td data-label="Status">
                                        {{ $appointment->getAppointmentStatus() }}
                                    </td>
                                    <td data-label="reason" class="truncate">
                                        {{ $appointment->reason }}
                                    </td>
                                    <td class="">
                                        <a href="{{ route('appointments.show', $appointment->id) }}">
                                            <svg class="scale-50 fill-blue-400" xmlns="http://www.w3.org/2000/svg"
                                                height="48" width="48">
                                                <path
                                                    d="M9 42q-1.25 0-2.125-.875T6 39V9q0-1.25.875-2.125T9 6h30q1.25 0 2.125.875T42 9v30q0 1.25-.875 2.125T39 42Zm0-3h30V13H9v26Zm15-5.25q-4 0-7.15-2.15-3.15-2.15-4.6-5.6 1.45-3.45 4.6-5.6Q20 18.25 24 18.25t7.15 2.15q3.15 2.15 4.6 5.6-1.45 3.45-4.6 5.6Q28 33.75 24 33.75Zm0-2.5q2.85 0 5.25-1.4T33 26q-1.35-2.45-3.75-3.85T24 20.75q-2.85 0-5.25 1.4T15 26q1.35 2.45 3.75 3.85t5.25 1.4Zm0-2.75q-1.05 0-1.775-.725Q21.5 27.05 21.5 26q0-1.05.725-1.775Q22.95 23.5 24 23.5q1.05 0 1.775.725.725.725.725 1.775 0 1.05-.725 1.775-.725.725-1.775.725Z" />
                                            </svg>
                                        </a>

                                    </td>
                                </tr>
                            @endforeach
                            <tr></tr>
                        </tbody>

                    </table>
            </div>
            @endif
        </div>


        {{-- prescriptions --}}



    </div>
    <div class="section capitalize">
        <h3 class="basis-full font-bold">Prescriptions</h3>
        <a class="basis-full font-bold"
            href="{{ route('prescriptions.create', ['patient_id' => $patient->id, 'user_id' => auth()->id()]) }}">
            <button class="px-3 py-2 border rounded-lg hover:bg-slate-600 hover:text-white">Add a
                Prescription</button>
        </a>

        <div class="prescriptions w-10/12 mx-auto">
            @if ($patient->prescriptions->isEmpty())
                <p>There are no prescriptions yet</p>
            @else
                <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach ($patient->prescriptions as $prescription)
                        <li class="py-3 sm:py-4">
                            <div class="flex items-center space-x-4">

                                <div class="flex-1 min-w-0">

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
            @endif

        </div>

    </div>

</x-app-layout>
