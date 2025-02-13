<x-base-layout :backRoute="route('card.index')">
    <x-slot name="header">En savoir plus sur le panier #{{$card->id}}</x-slot>

    <div class="container py-12">
        <div class="container-center">
        </div>
    </div>
</x-base-layout>