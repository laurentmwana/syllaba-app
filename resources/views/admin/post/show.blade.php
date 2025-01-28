<x-admin-layout :backRoute="route('#post.index')">
    <x-slot name="header">
        En savoir plus sur l"article #{{ $post->id }}
    </x-slot>

    <div class="container py-12">
        <div class="container-center">
           <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 items-start">
            <div class="container-card lg:col-span-1">
                <img class="block w-full" src="/storage/{{ $post->image }}" alt="image de l'article #{{ $post->id }}">
            </div>
            <div class="container-card lg:col-span-2">
                <h2 class="text-xl font-semibold mb-3">
                    {{ $post->title }}
                </h2>

                <p class="text-description">
                    {{ $post->content }}
                </p>
            </div>
           </div>
        </div>
    </div>
</x-admin-layout>
