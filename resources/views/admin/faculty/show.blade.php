<x-admin-layout :backRoute="route('#faculty.index')">
    <x-slot name="header">
        En savoir plus sur la faculté #{{ $faculty->id }}
    </x-slot>

    <div class="container py-12">
        <div class="container-center">
            <div class="container-card">
                <h2 class="text-xl font-semibold mb-3">
                    {{ $faculty->name }}
                </h2>
            </div>
        </div>
    </div>
</x-admin-layout>
