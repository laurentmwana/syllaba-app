<x-admin-layout :backRoute="route('#year-academic.index')">
    <x-slot name="header">
        En savoir plus sur l'année  #{{ $year->id }}
    </x-slot>

    <div class="container py-12">
        <div class="container-center">
            <div class="container-card">
                <h2 class="text-xl font-semibold mb-3">
                    {{ $year->start }}-{{ $year->end }}
                </h2>

                <div class="my-3">
                    @include('shared.badge', [
                        'content' => $year->status
                    ])
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
