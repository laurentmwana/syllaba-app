<x-admin-layout :backRoute="route('#user.index')">
    <x-slot name="header">
        En savoir plus sur l'utilisateur #{{ $user->id }}
    </x-slot>

    <div class="container py-12">
        <div class="container-center">
            <div class="container-card">
                <h2 class="text-xl font-semibold mb-3">
                    {{ $user->name }}
                </h2>

                <p class="text-description">
                    {{ $user->email }}
                </p>
            </div>
        </div>
    </div>
</x-admin-layout>