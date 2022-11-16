<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            Edit User {{ $user->username }}
        </h2>
        <x-auth-validation-errors class="mb-4" :errors="$errors" />


        <div class="section">
            <form method="POST" action="{{ route('users.update', $user->id) }}">
                @csrf
                @method('PUT')
                <!-- First name -->
                <div>
                    <x-label for="first_name" value="First Name" />
                    <x-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="$user->first_name"
                        required />
                </div>

                <!-- Last name -->
                <div>
                    <x-label for="last_name" value="Last Name" />
                    <x-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="$user->last_name"
                        required />
                </div>

                <!-- Phone Number -->
                <div>
                    <x-label for="phone" value="Phone Number" />
                    <x-input id="phone" class="block mt-1 w-full" type="tel" name="phone" :value="$user->phone"
                        required />
                </div>

                <!-- Address -->
                <div>
                    <x-label for="address" value="Address" />
                    <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="$user->address"
                        required />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-label for="email" value="Email" />

                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="$user->email"
                        required />
                </div>

                <x-button class="ml-4">
                    Update User
                </x-button>
            </form>
        </div>

    </x-slot>
</x-app-layout>
