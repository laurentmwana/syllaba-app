<x-admin-layout :backRoute="route('#course.index')">
    <x-slot name="header">
        En savoir plus sur le cours #{{ $course->id }}
    </x-slot>

    <div class="container py-12">
        <div class="container-center">
            <div class="container-card">
                <h2 class="text-xl font-semibold mb-3">
                    {{ $course->name }}
                </h2>

                <p class="text-description">
                </p>
            </div>
        </div>
    </div>
</x-admin-layout>