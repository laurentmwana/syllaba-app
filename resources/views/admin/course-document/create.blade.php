<x-admin-layout :backRoute="route('#course-document.index')">
    <x-slot name="header">Création d'un support de cours</x-slot>

    <div class="container py-12">
        <div class="container-center">

            <div class="container-card max-w-xl">
                <p class="text-description mb-3">
                    Remplissez ces champs pour créer un support de cours (syllabus)
                </p>
                @include('admin.course-document._form', [
                'courseDocument' => $courseDocument,
                'courses' => $courses,
                'yearAcademics' => $yearAcademics,
                ])
            </div>
        </div>
    </div>
</x-admin-layout>