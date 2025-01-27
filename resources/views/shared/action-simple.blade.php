@props(['routeEdit' => null, 'routeDelete' => null, 'routeShow' => null])

<div class="flex items-center justify-start lg:justify-end gap-3">
    @if ($routeDelete !== null)
    <form action="{{ $routeDelete }}" method="post" onsubmit="return confirm('Voulez-vous vraiment effectuer cette action ?')">
        @csrf
        @method('DELETE')
        <x-danger-button type="submit">
            Supprimer
        </x-danger-button>
    </form>
    @endif

    @if ($routeEdit !== null)
   <x-primary-button :href="$routeEdit" :isLink="true">
    Editer
   </x-primary-button>
    @endif


    @if ($routeShow !== null)
   <x-secondary-button :href="$routeShow" :isLink="true">
        Voir
   </x-secondary-button>
    @endif

</div>
