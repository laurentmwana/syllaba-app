<x-admin-layout :backRoute="route('#department.index')">
    <x-slot name="header">Création d'un département</x-slot>

    <div class="container py-12">
        <div class="container-center">

            <div class="container-card max-w-xl">
                <p class="text-description mb-3">
                    Remplissez ces champs pour créer un département
                </p>
                @include('admin.department._form', [
                    'department' => $department,
                    'faculties' => $faculties,
                ])
            </div>
        </div>
    </div>
</x-admin-layout>
