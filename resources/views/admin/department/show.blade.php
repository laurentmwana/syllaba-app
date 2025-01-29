<x-admin-layout :backRoute="route('#department.index')">
    <x-slot name="header">
        En savoir plus sur la categorie #{{ $department->id }}
    </x-slot>

    <div class="container py-12">
        <div class="container-center">
            <div class="container-card">
                <h2 class="text-xl font-semibold mb-3">
                    {{ $department->name }}
                </h2>

                <p class="text-description">
                    {{ $department->alias }}
                </p>
            </div>
        </div>
    </div>
</x-admin-layout>
