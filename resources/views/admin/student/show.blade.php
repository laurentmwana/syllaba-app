<x-admin-layout :backRoute="route('#student.index')">
    <x-slot name="header">
        En savoir plus sur l'étudiant(e) #{{ $student->id }}
    </x-slot>

    <div class="container py-12">
        <div class="container-center">
            <div class="container-card">
                <h2 class="text-xl font-semibold mb-3">
                    {{ $student->name }} - {{ $student->firstname }}
                </h2>

                <p class="text-description">
                    {{ $student->lastname }}
                </p>
            </div>
        </div>
    </div>
</x-admin-layout>
