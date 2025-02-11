<x-admin-layout :backRoute="route('#course.index')">
    <x-slot name="header">Création d'un cours</x-slot>

    <div class="container py-12">
        <div class="container-center">

            <div class="container-card max-w-xl">
                <p class="text-description mb-3">
                    Remplissez ces champs pour créer un cours
                </p>
                @include('admin.course._form', [
                'course' => $course,
                'professors' => $professors,
                'levels' => $levels,
                ])
            </div>
        </div>
    </div>
</x-admin-layout>