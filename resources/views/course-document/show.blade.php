<x-base-layout :backRoute="route('course-document.index')">
    <x-slot name="header">En savoir plus sur le support de cours #{{$courseDocument->id}}</x-slot>

    <div class="container py-12">
        <div class="container-center">
        </div>
    </div>
</x-base-layout>