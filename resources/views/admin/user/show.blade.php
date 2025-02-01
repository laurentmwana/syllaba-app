<x-admin-layout :backRoute="route('#option.index')">
    <x-slot name="header">
        En savoir plus sur la option #{{ $option->id }}
    </x-slot>

    <div class="container py-12">
        <div class="container-center">
            <div class="container-card">
                <h2 class="text-xl font-semibold mb-3">
                    {{ $option->name }}
                </h2>

                <p class="text-description">
                    {{ $option->alias }}
                </p>
            </div>
        </div>
    </div>
</x-admin-layout>
