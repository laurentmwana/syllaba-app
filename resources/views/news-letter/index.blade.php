<x-base-layout :backRoute="route('welcome')">
    <x-slot name="header">Service de NewsLetter</x-slot>

    <div class="container py-12">
        <div class="container-center">

            <div class="container-card">
                @if ($newLetter->unsubscribe_at !== null)
                <h2 class="mb-3 text-xl text-gray-700 dark:text-gray-400 font-semibold">
                    Vous n'êtes pas inscrit(e) au service de news-letter
                </h2>

                <p class="text-description">
                    Déscrist(e) le {{ $newLetter->unsubscribe_at }}
                </p>
                @else
                <h2 class="mb-3 text-xl text-gray-700 dark:text-gray-400 font-semibold">
                    Vous êtes inscrit(e) au service de news-letter
                </h2>

                <p class="text-description">
                    Dernière modification le {{ $newLetter->updated_at->format('d/m/Y à H:i:s') }}
                </p>
                @endif
            </div>
        </div>
    </div>
</x-base-layout>