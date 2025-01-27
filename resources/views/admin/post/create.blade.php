<x-admin-layout>
    <x-slot name="header">Création d'un article</x-slot>

    <div class="container py-12">
        <div class="container-center">

            <div class="container-card max-w-xl">
                <p class="text-description mb-3">
                    Remplissez ces champs pour publier un article
                </p>
                @include('admin.post._form', [
                    'post' => $post
                ])
            </div>
        </div>
    </div>
</x-admin-layout>
