<x-guest-layout>
    <div class="container">
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <div class="section step-1">
            <h3 class="text-xl font-bold basis-full">Step 1</h3>
            @if ($step == 1)
                <p class="basis-full text-xs text-red-500">connection failed please set the correct database credentials
                </p>
                <livewire:env-edit varName="DB_HOST" />
                <livewire:env-edit varName="DB_PASSWORD" />
                <livewire:env-edit varName="DB_DATABASE" />
                <livewire:env-edit varName="DB_USERNAME" />
                <a href="{{ route('install') }}">Check Connection</a>
            @else
                <p>
                    <svg xmlns="http://www.w3.org/2000/svg" height="48" width="48">
                        <path fill="blue"
                            d="M21.05 33.1 35.2 18.95l-2.3-2.25-11.85 11.85-6-6-2.25 2.25ZM24 44q-4.1 0-7.75-1.575-3.65-1.575-6.375-4.3-2.725-2.725-4.3-6.375Q4 28.1 4 24q0-4.15 1.575-7.8 1.575-3.65 4.3-6.35 2.725-2.7 6.375-4.275Q19.9 4 24 4q4.15 0 7.8 1.575 3.65 1.575 6.35 4.275 2.7 2.7 4.275 6.35Q44 19.85 44 24q0 4.1-1.575 7.75-1.575 3.65-4.275 6.375t-6.35 4.3Q28.15 44 24 44Zm0-3q7.1 0 12.05-4.975Q41 31.05 41 24q0-7.1-4.95-12.05Q31.1 7 24 7q-7.05 0-12.025 4.95Q7 16.9 7 24q0 7.05 4.975 12.025Q16.95 41 24 41Zm0-17Z" />
                    </svg>
                    Done With Step 1. Database configured correctly
                </p>
            @endif

        </div>
        <div class="step-2 section">
            <h3 class="text-xl font-bold basis-full">Step 2</h3>
            @if ($step == 2)
                <p class="basis-full text-xs">Please follow 1 or 2 to complete this step</p>
                <form action="{{ route('install.migrate') }}" method="POST">
                    @csrf
                    1). To Create base tables
                    <x-button>
                        artisan migrate
                    </x-button>
                </form>
                <form action="{{ route('install.migrate-fresh') }}" method="POST">
                    @csrf
                    2). Drop and create new base tables
                    <x-button>
                        artisan migrate:fresh
                    </x-button>
                    You will loose all existing data by running this command
                </form>
            @else
                @if ($step < 2)
                    <p> please finish the above steps</p>
                @endif
                @if ($step > 2)
                    <p>
                        <svg xmlns="http://www.w3.org/2000/svg" height="48" width="48">
                            <path fill="blue"
                                d="M21.05 33.1 35.2 18.95l-2.3-2.25-11.85 11.85-6-6-2.25 2.25ZM24 44q-4.1 0-7.75-1.575-3.65-1.575-6.375-4.3-2.725-2.725-4.3-6.375Q4 28.1 4 24q0-4.15 1.575-7.8 1.575-3.65 4.3-6.35 2.725-2.7 6.375-4.275Q19.9 4 24 4q4.15 0 7.8 1.575 3.65 1.575 6.35 4.275 2.7 2.7 4.275 6.35Q44 19.85 44 24q0 4.1-1.575 7.75-1.575 3.65-4.275 6.375t-6.35 4.3Q28.15 44 24 44Zm0-3q7.1 0 12.05-4.975Q41 31.05 41 24q0-7.1-4.95-12.05Q31.1 7 24 7q-7.05 0-12.025 4.95Q7 16.9 7 24q0 7.05 4.975 12.025Q16.95 41 24 41Zm0-17Z" />
                        </svg>
                        Done With Step 2. tables have being created
                    </p>
                @endif
            @endif
        </div>

        <div class="step-3 section flex-col">

            <h3 class="text-xl font-bold basis-full">Step 3</h3>
            @if ($step == 3)
                <livewire:user-admin type='doctor' :status="$statuses['doctor']" />
                <livewire:user-admin type='pharmacist' :status="$statuses['pharmacist']" />
                <livewire:user-admin type='receptionist' :status="$statuses['receptionist']" />
            @else
                @if ($step < 3)
                    <p> please finish the above steps</p>
                @endif
                @if ($step > 3)
                    <p>
                        <svg xmlns="http://www.w3.org/2000/svg" height="48" width="48">
                            <path fill="blue"
                                d="M21.05 33.1 35.2 18.95l-2.3-2.25-11.85 11.85-6-6-2.25 2.25ZM24 44q-4.1 0-7.75-1.575-3.65-1.575-6.375-4.3-2.725-2.725-4.3-6.375Q4 28.1 4 24q0-4.15 1.575-7.8 1.575-3.65 4.3-6.35 2.725-2.7 6.375-4.275Q19.9 4 24 4q4.15 0 7.8 1.575 3.65 1.575 6.35 4.275 2.7 2.7 4.275 6.35Q44 19.85 44 24q0 4.1-1.575 7.75-1.575 3.65-4.275 6.375t-6.35 4.3Q28.15 44 24 44Zm0-3q7.1 0 12.05-4.975Q41 31.05 41 24q0-7.1-4.95-12.05Q31.1 7 24 7q-7.05 0-12.025 4.95Q7 16.9 7 24q0 7.05 4.975 12.025Q16.95 41 24 41Zm0-17Z" />
                        </svg>
                        Done With Step 3. Admin users created
                    </p>
                @endif
            @endif
        </div>


        <div class="step-4 section flex-col">

            <h3 class="text-xl font-bold basis-full">Step 4</h3>
            @if ($step == 4)
                <livewire:env-edit varName="VONAGE_KEY" />
                <livewire:env-edit varName="VONAGE_SECRET" />
                <a href="{{ route('install') }}">Finish Installation</a>
            @else
                @if ($step < 4)
                    <p> please finish the above steps</p>
                @endif
                @if ($step > 4)
                    <p>
                        <svg xmlns="http://www.w3.org/2000/svg" height="48" width="48">
                            <path fill="blue"
                                d="M21.05 33.1 35.2 18.95l-2.3-2.25-11.85 11.85-6-6-2.25 2.25ZM24 44q-4.1 0-7.75-1.575-3.65-1.575-6.375-4.3-2.725-2.725-4.3-6.375Q4 28.1 4 24q0-4.15 1.575-7.8 1.575-3.65 4.3-6.35 2.725-2.7 6.375-4.275Q19.9 4 24 4q4.15 0 7.8 1.575 3.65 1.575 6.35 4.275 2.7 2.7 4.275 6.35Q44 19.85 44 24q0 4.1-1.575 7.75-1.575 3.65-4.275 6.375t-6.35 4.3Q28.15 44 24 44Zm0-3q7.1 0 12.05-4.975Q41 31.05 41 24q0-7.1-4.95-12.05Q31.1 7 24 7q-7.05 0-12.025 4.95Q7 16.9 7 24q0 7.05 4.975 12.025Q16.95 41 24 41Zm0-17Z" />
                        </svg>
                        Done With Step 4. SMS credentials set successfully
                    </p>
                @endif
            @endif
        </div>


    </div>

</x-guest-layout>
