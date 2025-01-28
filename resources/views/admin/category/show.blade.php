<x-admin-layout :backRoute="route('#category.index')">
    <x-slot name="header">
        En savoir plus sur la categorie #{{ $category->id }}
    </x-slot>

    <div class="container py-12">
        <div class="container-center">
            <div class="container-card">
                <h2 class="text-xl font-semibold mb-3">
                    {{ $category->name }}
                </h2>

                <p class="text-description">
                    {{ $category->description }}
                </p>
            </div>
        </div>
    </div>
</x-admin-layout>
