<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Notifications
        </h2>
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        @if (session('delete-messag e'))
            <div class=" text-xs text-red-500">
                {{ session('delete-message') }}
            </div>
        @endif
    </x-slot>
    <div class="container">
        <div class="section">
            @foreach ($notifications as $notification)
                <div class="notification basis-full">
                    <p class=" text-lg font-semibold">{{ $notification->title }}
                        <span
                            class=" text-xs font-light">{{ \Carbon\Carbon::parse($notification->created_at)->format('D, d/M h:i A') }}</span>
                        @if (!$notification->is_read)
                            <span class="text-xs badge">new</span>
                        @endif
                    </p>
                    <div class="flex justify-between">
                        <p>{{ $notification->message }}</p>
                        @if ($notification->action)
                            <a href="{{ $notification->action }}">view</a>
                        @endif
                    </div>
                    <hr>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
