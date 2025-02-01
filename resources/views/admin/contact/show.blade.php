<x-admin-layout :backRoute="route('#contact.index')">
    <x-slot name="header">
        En savoir plus sur la contact #{{ $contact->id }}
    </x-slot>

    <div class="container py-12">
        <div class="container-center">
            <div class="container-card">
                <h2 class="text-xl font-semibold mb-3">
                    {{ $contact->name }}
                </h2>

                <p class="text-description">
                    {{ $contact->subject }}
                </p>
            </div>
        </div>
    </div>
</x-admin-layout>