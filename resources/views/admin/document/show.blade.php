<x-admin-layout :backRoute="route('#document.index')">
    <x-slot name="header">
        En savoir plus sur le document #{{ $document->id }}
    </x-slot>

    <div class="container py-12">
        <div class="container-center">
            <div class="container-card">
                <h2 class="text-xl font-semibold mb-3">
                    {{ $document->title }}
                </h2>

                <p class="text-description">
                    {{ $document->description }}
                </p>
            </div>
        </div>
    </div>
</x-admin-layout>