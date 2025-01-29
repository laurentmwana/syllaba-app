<x-admin-layout :backRoute="route('#option.index')">
    <x-slot name="header">Création d'une option</x-slot>

    <div class="container py-12">
        <div class="container-center">

            <div class="container-card max-w-xl">
                <p class="text-description mb-3">
                    Remplissez ces champs pour créer une option
                </p>
                @include('admin.option._form', [
                    'option' => $option,
                    'departments' => $departments
                ])
            </div>
        </div>
    </div>
</x-admin-layout>
