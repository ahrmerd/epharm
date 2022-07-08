<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            New Appointment
        </h2>
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

    </x-slot>
    <div class="container m-auto">
        <form class="border" action="{{ route('appointments.store') }}" method="POST">
            @csrf

            <div class="form-section">
                <h3 class=" basis-full">Appointment Information</h3>
                {{-- user_id, patient_id, date_time, status, resaon --}}

                <!-- user -->
                <livewire:user-search :user="null" model="Appointment" />

                <!-- patient -->
                <livewire:patient-search :patient="null" model="Appointment" />


                {{-- date_time --}}
                <div>
                    <x-label for="date_time" value="date and time" />
                    <x-input id="date_time" class="block mt-1 w-full" type="datetime-local" name="date_time"
                        :value="old('date_time')" required />
                </div>

                <!-- status -->
                <div>
                    <x-label for="status" value="status" />
                    <x-select id="status" class="block mt-1 w-full" name="status" :data=$statuses :value="old('status')"
                        required />
                </div>

                <!-- reason -->
                <div>
                    <x-label for="reason" value="reason" />
                    <x-input id="reason" class="block mt-1 w-full" type="text" name="reason" :value="old('reason')"
                        required />
                </div>

                <x-button class="m-auto mt-8">
                    Add Appointments
                </x-button>
            </div>
        </form>
    </div>
</x-app-layout>
