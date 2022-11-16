<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="mt-2 flex flex-wrap justify-evenly gap-4">

        {{-- others section --}}
        <x-card>
            <x-slot name='title'></x-slot>
            <x-slot name='actions'></x-slot>
            <div class="flex items-center gap-4 justify-center flex-wrap">
                <a href="{{ route('patients.index') }}"
                    class="hover:fill-blue-500 flex flex-col items-center justify-center w-2/5">
                    <svg class="scale-150" xmlns="http://www.w3.org/2000/svg" height="48" width="48">
                        <path
                            d="M22.05 23Q18.9 23 16.7 20.8Q14.5 18.6 14.5 15.5Q14.5 12.35 16.7 10.175Q18.9 8 22 8Q25.15 8 27.325 10.175Q29.5 12.35 29.5 15.45Q29.5 18.6 27.325 20.8Q25.15 23 22.05 23ZM22 20Q23.9 20 25.2 18.675Q26.5 17.35 26.5 15.5Q26.5 13.6 25.2 12.3Q23.9 11 22.05 11Q20.15 11 18.825 12.3Q17.5 13.6 17.5 15.45Q17.5 17.35 18.825 18.675Q20.15 20 22 20ZM44.9 47 37.9 40Q36.75 40.85 35.525 41.175Q34.3 41.5 33 41.5Q29.45 41.5 26.975 39.025Q24.5 36.55 24.5 33Q24.5 29.45 26.975 26.975Q29.45 24.5 33 24.5Q36.55 24.5 39.025 26.975Q41.5 29.45 41.5 33Q41.5 34.3 41.175 35.525Q40.85 36.75 40 37.9L47 44.9ZM33 38.5Q35.35 38.5 36.925 36.925Q38.5 35.35 38.5 33Q38.5 30.65 36.925 29.075Q35.35 27.5 33 27.5Q30.65 27.5 29.075 29.075Q27.5 30.65 27.5 33Q27.5 35.35 29.075 36.925Q30.65 38.5 33 38.5ZM6 40V35.3Q6 33.45 6.875 32.15Q7.75 30.85 9.4 30Q11.75 28.85 15.525 27.825Q19.3 26.8 23.2 27.05Q22.8 27.7 22.45 28.475Q22.1 29.25 21.9 30Q18 29.95 15.1 30.925Q12.2 31.9 10.6 32.7Q9.9 33.1 9.45 33.775Q9 34.45 9 35.3V37H22.2Q22.5 37.85 22.925 38.575Q23.35 39.3 23.9 40ZM22 15.5Q22 15.5 22 15.5Q22 15.5 22 15.5Q22 15.5 22 15.5Q22 15.5 22 15.5Q22 15.5 22 15.5Q22 15.5 22 15.5Q22 15.5 22 15.5Q22 15.5 22 15.5ZM21.9 30Q21.9 30 21.9 30Q21.9 30 21.9 30Q21.9 30 21.9 30Q21.9 30 21.9 30Q21.9 30 21.9 30Q21.9 30 21.9 30Z" />
                    </svg>
                    <p class="mt-3">Patients Records</p>
                </a>
                <a href="{{ route('patients.create') }}"
                    class="hover:fill-blue-500 flex flex-col items-center justify-center w-2/5">
                    <svg class="scale-150" xmlns="http://www.w3.org/2000/svg" height="48" width="48">
                        <path
                            d="M36.5 28v-6.5H30v-3h6.5V12h3v6.5H46v3h-6.5V28ZM18 23.95q-3.3 0-5.4-2.1-2.1-2.1-2.1-5.4 0-3.3 2.1-5.4 2.1-2.1 5.4-2.1 3.3 0 5.4 2.1 2.1 2.1 2.1 5.4 0 3.3-2.1 5.4-2.1 2.1-5.4 2.1ZM2 40v-4.7q0-1.75.9-3.175Q3.8 30.7 5.4 30q3.75-1.65 6.675-2.325Q15 27 18 27t5.925.675Q26.85 28.35 30.55 30q1.6.75 2.525 2.15.925 1.4.925 3.15V40Zm3-3h26v-1.7q0-.8-.4-1.525-.4-.725-1.25-1.075-3.5-1.7-5.975-2.2Q20.9 30 18 30t-5.375.525Q10.15 31.05 6.6 32.7q-.75.35-1.175 1.075Q5 34.5 5 35.3Zm13-16.05q1.95 0 3.225-1.275Q22.5 18.4 22.5 16.45q0-1.95-1.275-3.225Q19.95 11.95 18 11.95q-1.95 0-3.225 1.275Q13.5 14.5 13.5 16.45q0 1.95 1.275 3.225Q16.05 20.95 18 20.95Zm0-4.5ZM18 30Z" />
                    </svg>
                    <p class="mt-3">Add Patient</p>
                </a>
                <a href="{{ route('users.user') }}"
                    class="hover:fill-blue-500 flex flex-col items-center justify-center w-2/5">
                    <svg class="scale-150" xmlns="http://www.w3.org/2000/svg" height="48" width="48">
                        <path
                            d="M24 23.95Q20.7 23.95 18.6 21.85Q16.5 19.75 16.5 16.45Q16.5 13.15 18.6 11.05Q20.7 8.95 24 8.95Q27.3 8.95 29.4 11.05Q31.5 13.15 31.5 16.45Q31.5 19.75 29.4 21.85Q27.3 23.95 24 23.95ZM8 40V35.3Q8 33.4 8.95 32.05Q9.9 30.7 11.4 30Q14.75 28.5 17.825 27.75Q20.9 27 24 27Q27.1 27 30.15 27.775Q33.2 28.55 36.55 30Q38.1 30.7 39.05 32.05Q40 33.4 40 35.3V40ZM11 37H37V35.3Q37 34.5 36.525 33.775Q36.05 33.05 35.35 32.7Q32.15 31.15 29.5 30.575Q26.85 30 24 30Q21.15 30 18.45 30.575Q15.75 31.15 12.6 32.7Q11.9 33.05 11.45 33.775Q11 34.5 11 35.3ZM24 20.95Q25.95 20.95 27.225 19.675Q28.5 18.4 28.5 16.45Q28.5 14.5 27.225 13.225Q25.95 11.95 24 11.95Q22.05 11.95 20.775 13.225Q19.5 14.5 19.5 16.45Q19.5 18.4 20.775 19.675Q22.05 20.95 24 20.95ZM24 16.45Q24 16.45 24 16.45Q24 16.45 24 16.45Q24 16.45 24 16.45Q24 16.45 24 16.45Q24 16.45 24 16.45Q24 16.45 24 16.45Q24 16.45 24 16.45Q24 16.45 24 16.45ZM24 37Q24 37 24 37Q24 37 24 37Q24 37 24 37Q24 37 24 37Q24 37 24 37Q24 37 24 37Q24 37 24 37Q24 37 24 37Z" />
                    </svg>
                    <p class="mt-3">My Profile</p>
                </a>
                @if ($user->is_admin)
                    <a href="{{ route('users.index') }}"
                        class="hover:fill-blue-500 flex flex-col items-center justify-center w-2/5">
                        <svg class="scale-150" xmlns="http://www.w3.org/2000/svg" height="48" width="48">
                            <path
                                d="M20 23.75Q16.7 23.75 14.6 21.65Q12.5 19.55 12.5 16.25Q12.5 12.95 14.6 10.85Q16.7 8.75 20 8.75Q23.3 8.75 25.4 10.85Q27.5 12.95 27.5 16.25Q27.5 19.55 25.4 21.65Q23.3 23.75 20 23.75ZM4 39.8V35.1Q4 33.35 4.875 31.95Q5.75 30.55 7.4 29.8Q11 28.2 14.075 27.5Q17.15 26.8 20 26.8Q20.25 26.8 20.575 26.8Q20.9 26.8 21.15 26.8Q20.85 27.5 20.7 28.175Q20.55 28.85 20.45 29.8H20Q17.1 29.8 14.325 30.425Q11.55 31.05 8.6 32.5Q7.8 32.9 7.4 33.625Q7 34.35 7 35.1V36.8H20.45Q20.7 37.7 21.05 38.425Q21.4 39.15 21.9 39.8ZM33.35 42 32.85 38.7Q32 38.45 31.125 37.975Q30.25 37.5 29.65 36.9L26.9 37.5L25.65 35.4L28 33.2Q27.9 32.75 27.9 31.95Q27.9 31.15 28 30.7L25.65 28.5L26.9 26.4L29.65 27Q30.25 26.4 31.125 25.925Q32 25.45 32.85 25.2L33.35 21.9H36.05L36.55 25.2Q37.4 25.45 38.275 25.925Q39.15 26.4 39.75 27L42.5 26.4L43.75 28.5L41.4 30.7Q41.5 31.15 41.5 31.95Q41.5 32.75 41.4 33.2L43.75 35.4L42.5 37.5L39.75 36.9Q39.15 37.5 38.275 37.975Q37.4 38.45 36.55 38.7L36.05 42ZM34.7 35.95Q36.5 35.95 37.6 34.85Q38.7 33.75 38.7 31.95Q38.7 30.15 37.6 29.05Q36.5 27.95 34.7 27.95Q32.9 27.95 31.8 29.05Q30.7 30.15 30.7 31.95Q30.7 33.75 31.8 34.85Q32.9 35.95 34.7 35.95ZM20 20.75Q21.95 20.75 23.225 19.475Q24.5 18.2 24.5 16.25Q24.5 14.3 23.225 13.025Q21.95 11.75 20 11.75Q18.05 11.75 16.775 13.025Q15.5 14.3 15.5 16.25Q15.5 18.2 16.775 19.475Q18.05 20.75 20 20.75ZM20 16.25Q20 16.25 20 16.25Q20 16.25 20 16.25Q20 16.25 20 16.25Q20 16.25 20 16.25Q20 16.25 20 16.25Q20 16.25 20 16.25Q20 16.25 20 16.25Q20 16.25 20 16.25ZM20.45 36.8Q20.45 36.8 20.45 36.8Q20.45 36.8 20.45 36.8Q20.45 36.8 20.45 36.8Q20.45 36.8 20.45 36.8Q20.45 36.8 20.45 36.8Q20.45 36.8 20.45 36.8Z" />
                        </svg>
                        <p class="mt-3">Manage other accounts</p>

                    </a>
                @endif

            </div>

        </x-card>





        {{-- drugs section --}}
        <x-card class="">
            <x-slot name='title'>Drugs</x-slot>
            <x-slot name='actions'>
                <a href="{{ route('drugs.index') }}" class="link-btn">
                    View all
                </a>
                <a href="{{ route('drugs.index') }}" class="link-btn">
                    Add
                </a>
            </x-slot>
            <table class="w-full text-base text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <th>Drug Name</th>
                    <th>Brand</th>
                    <th></th>


                </thead>
                @foreach ($drugs as $drug)
                    <tr
                        class="border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700">
                        <td>{{ $drug->name }}</td>
                        <td>{{ $drug->brand }}</td>
                        <td><a href="{{ route('drugs.show', $drug->id) }}">view </a></td>
                    </tr>
                @endforeach
            </table>
        </x-card>

        {{-- appointments section --}}
        <x-card class="">
            <x-slot name='title'>Appointments</x-slot>
            <x-slot name='actions' class="">
                <a href="{{ route('appointments.index') }}" class="link-btn">
                    View all
                </a>
                <a href="{{ route('appointments.create') }}" class="link-btn">
                    Add
                </a>
            </x-slot>
            <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                @foreach ($appointments as $appointment)
                    <li class="py-3 sm:py-4">
                        <div class="flex items-center space-x-4">
                            <p class="text-xs font-thin">
                                {{ \Carbon\Carbon::parse($appointment->date_time)->format('d/m h:i A') }}</p>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                    {{ $appointment->patient->full_name }}
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    {{ $appointment->reason }}
                                </p>
                            </div>
                            <a href="/"> view </a>
                        </div>
                    </li>
                @endforeach
            </ul>
        </x-card>

        {{-- prescriptions section --}}
        <x-card class="">
            <x-slot name='title'>Prescriptions</x-slot>
            <x-slot name='actions' class="">
                <a href="{{ route('prescriptions.index') }}" class="link-btn">
                    View all
                </a>
                <a href="{{ route('prescriptions.user') }}" class="link-btn">
                    Mine
                </a>
            </x-slot>
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
                                @if (auth()->user()->isDoctor() ||
                                    !auth()->user()->isPharmacist())
                                    <p class="text-sm text-gray-900 truncate dark:text-gray-400">
                                        Pharmacist involved: {{ $prescription->pharmacist->username }}
                                    </p>
                                @endif
                                @if (auth()->user()->isPharmacist() ||
                                    !auth()->user()->isDoctor())
                                    <p class="text-sm text-gray-900 truncate dark:text-gray-400">
                                        Doctor involved: {{ $prescription->doctor->username }}
                                    </p>
                                @endif
                            </div>
                            <a href="{{ route('prescriptions.show', $prescription->id) }}"> view </a>
                        </div>
                    </li>
                @endforeach
            </ul>
        </x-card>





    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
