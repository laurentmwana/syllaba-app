<x-admin-layout :backRoute="route('#faculty.index')">
    <x-slot name="header">Création d'une faculté</x-slot>

    <div class="container py-12">
        <div class="container-center">

            <div class="container-card max-w-xl">
                <p class="text-description mb-3">
                    Remplissez ces champs pour ajouter une faculté
                </p>
                @include('admin.faculty._form', [
                    'faculty' => $faculty,
                ])
            </div>
        </div>
    </div>
</x-admin-layout>
