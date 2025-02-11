<x-admin-layout :backRoute="route('#quiz.index')">
    <x-slot name="header">
        En savoir plus sur la quiz #{{ $quiz->id }}
    </x-slot>

    <div class="container py-12">
        <div class="container-center">
            <div class="container-card">
                <h2 class="text-xl font-semibold mb-3">
                    {{ $quiz->question }}
                </h2>

                <p class="text-description">
                    {{ $quiz->answer }}
                </p>
            </div>
        </div>
    </div>
</x-admin-layout>