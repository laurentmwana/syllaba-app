<x-admin-layout :backRoute="route('#category.index')">
    <x-slot name="header">Création d'une categorie</x-slot>

    <div class="container py-12">
        <div class="container-center">

            <div class="container-card max-w-xl">
                <p class="text-description mb-3">
                    Remplissez ces champs pour publier un article
                </p>
                @include('admin.category._form', [
                    'category' => $category,
                ])
            </div>
        </div>
    </div>
</x-admin-layout>
