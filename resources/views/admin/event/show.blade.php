<x-admin-layout :backRoute="route('#event.index')">
    <x-slot name="header">
        En savoir plus sur l'évènement #{{ $event->id }}
    </x-slot>

    <div class="container py-12">
        <div class="container-center">
            <div class="container-card">
                <h2 class="text-xl font-semibold mb-3">
                    {{ $event->title }}
                </h2>

                <p class="text-description">
                    {{ $event->descrition }}
                </p>
            </div>
        </div>
    </div>
</x-admin-layout>
