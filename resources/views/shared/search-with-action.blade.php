@props(['routeAction' => "", 'countResult' => 0, 'routeIndex' => ''])
@php
    $hasSearch = request()->query->has('search') && !empty(request()->query->get('search'));
@endphp
<div class="space-y-3">
    <div class="flex items-center justify-between gap-3">
        <form action="" class="flex items-center gap-2">
            <x-text-input :value="request()->query->get('search')" id="search" name="search" placeholder="Recherche..." />
            <x-primary-button type="submit">
                Faire
            </x-primary-button>
        </form>

        <x-secondary-button :href="$routeAction" :isLink="true">
            Ajouter
        </x-secondary-button>
    </div>

     @if ($hasSearch)
     <div>
        <p class="text-xs text-muted-foreground flex items-center gap-3">
            <span>
            {{ $countResult }} {{ $countResult > 1 ? 'Résultats trouvés' : 'Résultat trouvé' }} pour cette recherche.
            </span>
            <a href="{{ $routeIndex }}" class="hover:underline">
                Réinitiliser la recherche
            </a>
        </p>
    </div>
    @endif
</div>
