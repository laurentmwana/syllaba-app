<x-admin-layout :backRoute="route('#comment.index')">
    <x-slot name="header">
        En savoir plus sur le commentaire  #{{ $comment->id }}
    </x-slot>

    <div class="container py-12">
        <div class="container-center">
            <div class="container-card">
                <h2 class="text-xl font-semibold mb-3">
                    {{ $comment->post->title }}
                </h2>

                <div class="my-3">
                    @include('shared.badge', [
                        'content' => $comment->status
                    ])
                </div>

                <p class="text-description">
                    {{ $comment->message }}
                </p>
            </div>
        </div>
    </div>
</x-admin-layout>
