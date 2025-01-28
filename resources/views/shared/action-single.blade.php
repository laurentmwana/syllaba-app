@props(['routeAction' => null, 'method' => 'POST', 'title' => 'Action'])

<form action="{{ $routeAction }}" method="post" onsubmit="return confirm('Voulez-vous vraiment effectuer cette action ?')">
    @csrf
    @method($method)
    <x-secondary-button type="submit">
        {{  $title }}
    </x-secondary-button>
</form>
