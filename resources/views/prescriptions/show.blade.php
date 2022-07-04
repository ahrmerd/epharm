<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            View Prescription
        </h2>
        <div class="flex gap-7">
            <a href="{{ route('prescriptions.edit', $prescription->id) }}">
                <button class="px-3 py-2 border rounded-lg hover:bg-slate-600 hover:text-white">Edit</button>
            </a>
            <form action="{{ route('prescriptions.destroy', $prescription->id) }}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit"
                    class="px-3 py-2 border rounded-lg hover:bg-slate-600 bg-red-500 text-white">Delete</button>
            </form>
        </div>

    </x-slot>
    <div class="container m-auto">
        <div class="items-center m-auto mt-5 w-10/12 border-2 border-blue-500 rounded-md p-4">
            <p class="text-2xl font-bold basis-full">Patient: {{ $prescription->patient->full_name }}</p>
            <p class="font-semibold">Doctor :
                <span class="font-thin text-blue-500 hover:cursor-pointer">{{ $prescription->doctor->username }}</span>
            </p>
            <p class="font-semibold">Pharmacist :
                <span
                    class="font-thin text-blue-500 hover:cursor-pointer">{{ $prescription->pharmacist->username }}</span>
            </p>
            <p class="font-semibold">diagnosis :
                <span class="font-thin text-blue-500 hover:cursor-pointer">{{ $prescription->diagnosis }}
                </span>
            </p>
            <div class="mt-8">
                <p class="font-semibold">Notes:</p>
                <p class="font-thin text-blue-500 hover:cursor-pointer">{{ $prescription->notes }}</p>
            </div>
        </div>

        <div class="items-center m-auto mt-5 w-10/12 border-2 border-blue-500 rounded-md p-4">
            <h3 class="text-xl font-bold">Medications</h3>
            <ul>
                @foreach ($medications as $medication)
                    <li class=" mb-4 border-b border-blue-500">
                        <p>Drug Name: {{ $medication->drug->name }}</p>
                        <p>Dosage: {{ $medication->dosage }}</p>
                        <p>Notes: {{ $medication->notes }}</p>
                    </li>
                @endforeach
                {{ $medications->links() }}
            </ul>
        </div>

    </div>
</x-app-layout>
