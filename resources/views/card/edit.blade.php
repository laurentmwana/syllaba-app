<x-admin-layout :backRoute="route('card.index')">
    <x-slot name="header">Editer le panier #{{ $card->id }}</x-slot>

    <div class="container py-12">
        <div class="container-center">
            <div class="container-card max-w-xl">
                <p class="text-description mb-3">
                    Remplissez ces champs pour editer un support de cours dans le panier
                </p>

                @include('card._form', [
                'card' => $card,
                'courseDocuments' => $courseDocuments,
                ])

            </div>
        </div>
    </div>
</x-admin-layout>