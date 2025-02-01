<x-admin-layout :backRoute="route('#document.index')">
    <x-slot name="header">Création d'un document</x-slot>

    <div class="container py-12">
        <div class="container-center">

            <div class="container-card max-w-xl">
                <p class="text-description mb-3">
                    Remplissez ces champs pour créer un document (syllabus)
                </p>
                @include('admin.document._form', [
                    'document' => $document,
                    'levels' => $levels
                ])
            </div>
        </div>
    </div>
</x-admin-layout>
