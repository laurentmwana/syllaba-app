<x-admin-layout :backRoute="route('#professor.index')">
    <x-slot name="header">
        En savoir plus sur le professeur #{{ $professor->id }}
    </x-slot>

    <div class="container py-12">
        <div class="container-center">
            <div class="container-card">
                <h2 class="text-xl font-semibold mb-3">
                    {{ $professor->name }} - {{ $professor->firstname }}
                </h2>

                <p class="text-description">
                    {{ $professor->lastname }}
                </p>
            </div>
        </div>
    </div>
</x-admin-layout>