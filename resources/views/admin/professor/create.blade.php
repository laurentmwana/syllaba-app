<x-admin-layout :backRoute="route('#professor.index')">
    <x-slot name="header">Création d'un professeur</x-slot>

    <div class="container py-12">
        <div class="container-center">

            <div class="container-card max-w-xl">
                <p class="text-description mb-3">
                    Remplissez ces champs pour créer un professeur
                </p>
                @include('admin.professor._form', [
                'professor' => $professor,
                'departments' => $departments,
                'genders' => $genders,
                ])
            </div>
        </div>
    </div>
</x-admin-layout>