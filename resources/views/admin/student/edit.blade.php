<x-admin-layout :backRoute="route('#option.index')">
    <x-slot name="header">Editer l'étudiant(e) #{{ $student->id }}</x-slot>

    <div class="container py-12">
        <div class="container-center">
            <div class="container-card max-w-xl">
                <p class="text-description mb-3">
                    Remplissez ces champs pour editer les informations de l'étudiant(e)
                </p>
                @include('admin.student._form', [
                    'student' => $student,
                    'genders' => $genders,
                ])
            </div>
        </div>
    </div>
</x-admin-layout>
