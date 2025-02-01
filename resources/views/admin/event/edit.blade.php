<x-admin-layout :backRoute="route('#event.index')">
    <x-slot name="header">Editer l'évènement #{{ $event->id }}</x-slot>

    <div class="container py-12">
        <div class="container-center">
            <div class="container-card max-w-xl">
                <p class="text-description mb-3">
                    Remplissez ces champs pour editer un évènement
                </p>
                @include('admin.event._form', [
                'event' => $event,
                'types' => $types
                ])
            </div>
        </div>
    </div>
</x-admin-layout>