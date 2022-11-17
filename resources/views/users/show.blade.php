<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            User Profile
        </h2>
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
    </x-slot>
    <div class="container section capitalize flex-col">

        <h3 class="basis-full font-bold">User Information

        </h3>
        <a class="basis-full font-bold" href="{{ route('users.edit', $user->id) }}">
            <button class="px-3 py-2 border rounded-lg hover:bg-slate-600 hover:text-white">Edit
                User</button>
        </a>
        <div class="">
            <span class="font-semibold">{{ $user->is_admin ? 'Admin' : '' }}
                @if ($user->is_admin)
                    <svg style="transform: scale(.5); display:inline-block" xmlns="http://www.w3.org/2000/svg"
                        height="48" width="48">
                        <path fill="blue"
                            d="m17.3 45-3.8-6.5-7.55-1.55.85-7.35L2 24l4.8-5.55-.85-7.35 7.55-1.55L17.3 3 24 6.1 30.7 3l3.85 6.55 7.5 1.55-.85 7.35L46 24l-4.8 5.6.85 7.35-7.5 1.55L30.7 45 24 41.9Zm1.35-3.95L24 38.8l5.5 2.25 3.35-5 5.85-1.5-.6-5.95 4.05-4.6-4.05-4.7.6-5.95-5.85-1.4-3.45-5L24 9.2l-5.5-2.25-3.35 5-5.85 1.4.6 5.95L5.85 24l4.05 4.6-.6 6.05 5.85 1.4ZM24 24Zm-2.15 6.65L33.2 19.4l-2.25-2.05-9.1 9-4.75-4.95-2.3 2.25Z" />
                    </svg>
                @endif
        </div>
        <div>
            <span class=" font-semibold">first name</span>
            <span>: {{ $user->first_name }} </span>
        </div>
        <div>
            <span class=" font-semibold">last name</span>
            <span>: {{ $user->last_name }} </span>
        </div>
        <div>
            <span class="font-semibold">Username</span>
            <span>: {{ $user->username }} </span>
        </div>

        <div>
            <span class="font-semibold">User Type</span>
            <span>: {{ $types[$user->user_type] }} </span>
        </div>


        <div>
            <span class=" font-semibold">email</span>
            <span style="text-transform: none">: {{ $user->email }} </span>
        </div>
        <div>
            <span class=" font-semibold">phone</span>
            <span>: {{ $user->phone }} </span>
        </div>
        <div class=" basis-full">
            <span class=" font-semibold">address</span>
            <span>: {{ $user->address }} </span>
        </div>

        @can('promote', App\Models\User::class)
            <form action="{{ route('users.promote', $user->id) }}" method="POST">
                @csrf<button type="submit" class="px-3 py-2 border rounded-lg hover:bg-slate-600 hover:text-white">Promote
                    User</button>
            </form>
        @endcan

        @livewire('change-password', ['user' => $user], key($user->id))

    </div>
</x-app-layout>
