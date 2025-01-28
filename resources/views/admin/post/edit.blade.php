<x-admin-layout :backRoute="route('#post.index')">
    <x-slot name="header">Editer l"article #{{ $post->id }}</x-slot>

    <div class="container py-12">
        <div class="container-center">
            <div class="container-card max-w-xl">
                <p class="text-description mb-3">
                    Remplissez ces champs pour editer un article
                </p>
                @include('admin.post._form', [
                    'post' => $post,
                    'categories' => $categories
                ])
            </div>
        </div>
    </div>
</x-admin-layout>
