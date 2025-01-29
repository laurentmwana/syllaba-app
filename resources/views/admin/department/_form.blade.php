<form class="space-y-4"
    action="{{ $department->id ? route('#department.update', ['id' => $department->id]) : route('#department.store') }}" method="POST">

@if($department->id)
@method('PUT')
<input type="hidden" name="id" value="{{ $department->id }}">
@endif
@csrf

<div>
    <x-input-label for="name">Nom</x-input-label>
    <x-text-input class="block w-full" value="{{ $department->id ? $department->name : old('name') }}" id="name" name="name" />
    <x-input-error :messages="$errors->get('name')" class="mt-2" />
</div>


<div>
    <x-input-label for="alias">Alias</x-input-label>
    <x-text-input class="block w-full" value="{{ $department->id ? $department->alias : old('alias') }}" id="alias" name="alias" />
    <x-input-error :messages="$errors->get('alias')" class="mt-2" />
</div>


<div>
    <x-input-label for="faculty_id">Faculté</x-input-label>
    <x-select.single class="block w-full" :options="$faculties" :value="old('faculty_id', $department->faculty_id)" id="faculty_id" name="faculty_id" />
    <x-input-error :messages="$errors->get('faculty_id')" class="mt-2" />
</div>

<x-primary-button>
    Sauvegarder
</x-primary-button>

</form>
