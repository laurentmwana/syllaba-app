<x-base-layout :backRoute="route('post.index')">
    <x-slot name="header">En savoir plus sur l'article #{{$post->id}}</x-slot>

    <div class="container py-12">
        <div class="container-center">
        </div>
    </div>
</x-base-layout>