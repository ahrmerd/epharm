<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            View Appointment
        </h2>
        <div class="flex gap-7">
            <a href="{{ route('appointments.edit', $appointment->id) }}">
                <button class="px-3 py-2 border rounded-lg hover:bg-slate-600 hover:text-white">Edit</button>
            </a>
            <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit"
                    class="px-3 py-2 border rounded-lg hover:bg-slate-600 bg-red-500 text-white">Delete</button>
            </form>
        </div>

    </x-slot>
    <div class="container mx-auto">
        <div class="form-section">
            <p class="text-2xl font-bold basis-full">Status: {{ $appointment->getAppointmentStatus() }}</p>
            <p class="font-semibold">Appointment For :
                <span class="font-light text-blue-500 hover:cursor-pointer">{{ $appointment->user->username }}</span>
            </p>
            <p class="font-semibold">with :
                <a href="{{ route('patients.show', $appointment->patient->id) }}"
                    class="text-blue-700 hover:cursor-pointer">{{ $appointment->patient->full_name }}
                </a>
            </p>
            <p class="font-semibold">on:
                <span class="font-light text-blue-500 hover:cursor-pointer">
                    {{ \Carbon\Carbon::parse($appointment->date_time)->format('d-m-y h:i A') }}
                </span>
            </p>
            <p class="font-semibold">because of:
                <span class="font-light text-blue-500 hover:cursor-pointer">{{ $appointment->reason }}</span>
            </p>
        </div>

    </div>
</x-app-layout>
