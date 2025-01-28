<form class="space-y-4"
    action="{{ $category->id ? route('#category.update', ['id' => $category->id]) : route('#category.store') }}" method="POST">

@if($category->id)
@method('PUT')
<input type="hidden" name="id" value="{{ $category->id }}">
@endif
@csrf

<div>
    <x-input-label for="name">Nom</x-input-label>
    <x-text-input class="block w-full" value="{{ $category->id ? $category->name : old('name') }}" id="name" name="name" />
    <x-input-error :messages="$errors->get('name')" class="mt-2" />
</div>


<div>
    <x-input-label for="description">Description</x-input-label>
    <x-textarea class="block w-full" value="{{$category->id ? $category->description : old('description')}}" id="description" name="description" />
    <x-input-error :messages="$errors->get('description')" class="mt-2" />
</div>

<x-primary-button>
    Sauvegarder
</x-primary-button>

</form>
