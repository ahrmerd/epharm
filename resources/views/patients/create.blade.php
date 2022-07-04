<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            New Patient
        </h2>
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

    </x-slot>
    <div class="container m-auto">
        <form class="border" action="{{ route('patients.store') }}" method="POST">
            @csrf
            {{-- Basic information, medical information and contact information --}}

            {{-- basic information --}}
            <div class="form-section">
                <h3 class=" basis-full">Basic Information</h3>
                {{-- first_name, last_name, birth_date, gender --}}

                <!-- first_name -->
                <div>
                    <x-label for="first_name" value="first name" />
                    <x-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')"
                        required />
                </div>

                <!-- last_name -->
                <div>
                    <x-label for="last_name" value="last name" />
                    <x-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')"
                        required />
                </div>

                <!-- gender -->
                <div>
                    <x-label for="gender" value="Gender" />
                    <x-select id="gender" class="block mt-1 w-full" name="gender" :data=$genders :value="old('gender')"
                        required />
                </div>

                <!-- birth_date -->
                <div>
                    <x-label for="birth_date" value="birth date" />
                    <x-input id="birth_date" class="block mt-1 w-full" type="date" name="birth_date" :value="old('birth_date')"
                        required />
                </div>

            </div>

            {{-- medical information --}}
            <div class="form-section">
                <h3 class="basis-full">Medical Information</h3>
                {{-- blood_group, blood_genotype, allergies --}}

                <!-- blood group -->
                <div>
                    <x-label for="blood_group" value="blood_group" />
                    <x-select id="blood_group" class="block mt-1 w-full" name="blood_group" :data=$blood_groups
                        :value="old('blood_group')" required />
                </div>


                <!-- blood genotype -->
                <div>
                    <x-label for="blood_genotype" value="blood_genotype" />
                    <x-select id="blood_genotype" class="block mt-1 w-full" name="blood_genotype" :data=$blood_genotypes
                        :value="old('blood_genotype')" required />
                </div>

                <!-- allergies -->
                <div>
                    <x-label for="allergies" value="allergies" />
                    <x-input id="allergies" class="block mt-1 w-full" type="text" name="allergies" :value="old('allergies', '')" />
                </div>
            </div>

            <div class="form-section flex flex-wrap">
                <h3 class=" basis-full">Contact Information</h3>
                {{-- email, phone, address --}}


                <!-- email -->
                <div>
                    <x-label for="email" value="email" />
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                        required />
                </div>

                <!-- lastname -->
                <div>
                    <x-label for="phone" value="phone" />
                    <x-input id="phone" class="block mt-1 w-full" type="tel" name="phone" :value="old('phone')" required />
                </div>

                <!-- gender -->
                <div>
                    <x-label for="address" value="address" />
                    <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')"
                        required />
                </div>

            </div>
            <x-button class="m-auto mt-8">
                Add Patient
            </x-button>
        </form>
    </div>
</x-app-layout>
