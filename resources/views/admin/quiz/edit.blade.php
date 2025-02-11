<x-admin-layout :backRoute="route('#quiz.index')">
    <x-slot name="header">Editer la quiz #{{ $quiz->id }}</x-slot>

    <div class="container py-12">
        <div class="container-center">
            <div class="container-card max-w-xl">
                <p class="text-description mb-3">
                    Remplissez ces champs pour editer une quiz
                </p>
                @include('admin.quiz._form', [
                'quiz' => $quiz,
                ])
            </div>
        </div>
    </div>
</x-admin-layout>