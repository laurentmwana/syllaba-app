<form class="space-y-6"
    action="{{ $option->id ? route('#option.update', ['id' => $option->id]) : route('#option.store') }}" method="POST">

@if($option->id)
@method('PUT')
<input type="hidden" name="id" value="{{ $option->id }}">
@endif
@csrf

<div>
    <x-input-label for="name">Nom</x-input-label>
    <x-text-input class="block w-full" value="{{ $option->id ? $option->name : old('name') }}" id="name" name="name" />
    <x-input-error :messages="$errors->get('name')" class="mt-2" />
</div>


<div>
    <x-input-label for="alias">Alias</x-input-label>
    <x-text-input class="block w-full" value="{{ $option->id ? $option->alias : old('alias') }}" id="alias" name="alias" />
    <x-input-error :messages="$errors->get('alias')" class="mt-2" />
</div>

<div>
    <x-input-label for="department_id">Départment</x-input-label>
    <x-select.single class="block w-full" :options="$departments" :value="old('department_id', $option->department_id)" id="department_id" name="department_id" />
    <x-input-error :messages="$errors->get('department_id')" class="mt-2" />
</div>

<x-primary-button>
    Sauvegarder
</x-primary-button>

</form>
