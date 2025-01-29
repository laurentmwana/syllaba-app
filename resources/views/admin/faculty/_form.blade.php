<form class="space-y-4"
    action="{{ $faculty->id ? route('#faculty.update', ['id' => $faculty->id]) : route('#faculty.store') }}" method="POST">

@if($faculty->id)
@method('PUT')
<input type="hidden" name="id" value="{{ $faculty->id }}">
@endif
@csrf

<div>
    <x-input-label for="name">Nom</x-input-label>
    <x-text-input class="block w-full" value="{{ $faculty->id ? $faculty->name : old('name') }}" id="name" name="name" />
    <x-input-error :messages="$errors->get('name')" class="mt-2" />
</div>

<x-primary-button>
    Sauvegarder
</x-primary-button>

</form>
