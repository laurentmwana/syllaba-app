<x-admin-layout :backRoute="route('#level.index')">
    <x-slot name="header">
        En savoir plus sur la promotion #{{ $level->id }}
    </x-slot>

    <div class="container py-12">
        <div class="container-center">
            <div class="container-card">
                <h2 class="text-xl font-semibold mb-3">
                    {{ $level->name }}
                </h2>

                <p class="text-description">
                    {{ $level->alias }}
                </p>
            </div>
        </div>
    </div>
</x-admin-layout>
