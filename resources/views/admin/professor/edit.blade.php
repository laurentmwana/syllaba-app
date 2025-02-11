<x-admin-layout :backRoute="route('#option.index')">
    <x-slot name="header">Editer le professeur #{{ $professor->id }}</x-slot>

    <div class="container py-12">
        <div class="container-center">
            <div class="container-card max-w-xl">
                <p class="text-description mb-3">
                    Remplissez ces champs pour editer les informations du professeur(e)
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