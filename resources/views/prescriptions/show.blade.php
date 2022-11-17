<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            View Prescription
        </h2>
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <div class="flex gap-7">
            @can('update', $prescription)
                <a href="{{ route('prescriptions.edit', $prescription->id) }}">
                    <button class="px-3 py-2 border rounded-lg hover:bg-slate-600 hover:text-white">Edit</button>
                </a>
            @endcan
            @can('delete', $prescription)
                <form action="{{ route('prescriptions.destroy', $prescription->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit"
                        class="px-3 py-2 border rounded-lg hover:bg-slate-600 bg-red-500 text-white">Delete</button>
                </form>
            @endcan
        </div>

    </x-slot>

    <div class="container m-auto">
        <div class="items-center m-auto mt-5 w-10/12 border-2 border-blue-500 rounded-md p-4">
            <p class="text-sm font-light">Created
                On {{ \Carbon\Carbon::parse($prescription->date_time)->format('D, d/M/y h:i A') }};

            </p>
            <p class="text-2xl font-bold basis-full">Patient: {{ $prescription->patient->full_name }}</p>
            <p class="font-semibold">Doctor :
                <span class="font-light text-blue-700 hover:cursor-pointer">{{ $prescription->doctor->username }}</span>
            </p>
            <p class="font-semibold">Pharmacist :
                <span
                    class="font-light text-blue-700 hover:cursor-pointer">{{ $prescription->pharmacist->username }}</span>
            </p>
            <p class="font-semibold">diagnosis :
                <span class="font-light text-blue-700 hover:cursor-pointer">{{ $prescription->diagnosis }}
                </span>
            </p>
            <div class="mt-8 mb-4">
                <p class="font-semibold">Notes:</p>
                <p class="font-light text-blue-700 hover:cursor-pointer">{{ $prescription->notes }}</p>
            </div>
            <p>last reminded:
                @if ($prescription->last_sms)
                    {{ \Carbon\Carbon::parse($prescription->last_sms)->format('D, d/M/y h:i A') }}
                @else
                    Never
                @endif
            </p>
            <form action="{{ route('prescriptions.notify', $prescription->id) }}" method="POST">
                @csrf
                <button type="submit" class="px-3 py-2 border rounded-lg hover:bg-slate-600 bg-blue-500 text-white">
                    Send SMS reminder
                </button>
            </form>
        </div>

        <div class="items-center m-auto mt-5 w-10/12 border-2 border-blue-500 rounded-md p-4">
            <div class="flex justify-between mb-4">
                <h3 class="text-xl font-bold">Medications</h3>
                @can('create', App\Models\Medication::class)
                    <livewire:add-medication prescription_id='{{ $prescription->id }}' />
                @endcan
            </div>
            <ul>
                @foreach ($medications as $medication)
                    <li class=" mb-4 border-b border-blue-500 flex justify-between">
                        <div>
                            <p>Drug Name: {{ $medication->drug->name }}</p>
                            <p>Dosage: {{ $medication->dosage }}</p>
                            <p>Notes: {{ $medication->notes }}</p>
                        </div>
                        @can('create', App\Models\Medication::class)
                            <div class="flex">
                                <livewire:add-medication :medication='$medication' prescription_id='{{ $prescription->id }}' />
                                <form action="{{ route('medications.destroy', $medication->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit"
                                        class="px-3 py-2 border rounded-lg hover:bg-slate-600 bg-red-500 text-white">Delete</button>
                                </form>

                            </div>
                        @endcan

                    </li>
                @endforeach
                {{ $medications->links() }}
            </ul>
        </div>

    </div>
</x-app-layout>
