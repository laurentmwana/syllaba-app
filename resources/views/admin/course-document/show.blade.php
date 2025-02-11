<x-admin-layout :backRoute="route('#course-document.index')">
    <x-slot name="header">
        En savoir plus sur le document #{{ $courseDocument->id }}
    </x-slot>

    <div class="container py-12">
        <div class="container-center">
            <div class="container-card">
                <h2 class="text-xl font-semibold mb-3">
                    {{ $courseDocument->title }}
                </h2>

                <p class="text-description">
                    {{ $courseDocument->description }}
                </p>
            </div>
        </div>
    </div>
</x-admin-layout>