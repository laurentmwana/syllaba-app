@props(['routeAction' => ""])
<div class="flex items-center justify-between gap-3">
    <form action="" class="flex items-center gap-2">
        <x-text-input id="search" name="search" placeholder="Recherche..." />
        <x-primary-button type="submit">
            Faire
        </x-primary-button>
    </form>

    <x-secondary-button :href="$routeAction" :isLink="true">
        Ajouter
    </x-secondary-button>
</div>
