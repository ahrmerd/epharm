<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            New Prescription
        </h2>
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

    </x-slot>
    <div class="container m-auto">
        <form class="border" action="{{ route('prescriptions.update', $prescription->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-section block">
                <h3 class=" basis-full">Prescription Information</h3>
                {{-- user_id, patient_id, date_time, status, resaon --}}


                <!-- patient -->

                <p>for {{ $prescription->patient->full_name }}</p>
                <input type="hidden" name="patient_id" value="{{ $prescription->patient->id }}">
                <!-- user -->
                <livewire:pharmacist-search name="pharmacist_id" :user="$prescription->pharmacist" model="Pharmacist"
                    description="involved" />




                <!-- diagnosis -->
                <div class=" mt-8">
                    <x-label for="diagnosis" value="diagnosis" />
                    <x-input id="diagnosis" class="block mt-1 w-full" type="text" name="diagnosis" :value="$prescription->diagnosis"
                        required />
                </div>

                <!-- notes -->
                <div class="mt-8">
                    <x-label for="notes" value="notes" />
                    <textarea name="notes" class="block mt-1 w-full" id="" rows="5" required>{{ $prescription->notes }}</textarea>
                </div>

            </div>
            <x-button class="m-auto mt-8">
                Update Prescription
            </x-button>
        </form>
    </div>
</x-app-layout>
