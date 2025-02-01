<x-admin-layout :backRoute="route('#level.index')">
    <x-slot name="header">Création d'une promotion</x-slot>

    <div class="container py-12">
        <div class="container-center">

            <div class="container-card max-w-xl">
                <p class="text-description mb-3">
                    Remplissez ces champs pour ajouter une promotion
                </p>
                @include('admin.level._form', [
                    'level' => $level,
                    'options' => $options
                ])
            </div>
        </div>
    </div>
</x-admin-layout>
