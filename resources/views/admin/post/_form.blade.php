<form class="space-y-4"
    action="{{ $post->id ? route('#post.update', ['id' => $post->id]) : route('#post.store') }}"
    method="post" enctype="multipart/form-data">

@if($post->id)
@method('PUT')
<input type="hidden" name="id" value="{{ $post->id }}">
@endif
@csrf

<div>
    <x-input-label for="image">Image</x-input-label>
    <x-text-input type="file" class="block w-full" id="image" name="image" />
    <x-input-error :messages="$errors->get('image')" class="mt-2" />
</div>


<div>
    <x-input-label for="name">Titre</x-input-label>
    <x-text-input class="block w-full" value="{{ $post->id ? $post->title : old('title') }}" id="title" name="title" />
    <x-input-error :messages="$errors->get('title')" class="mt-2" />
</div>

<div>
    <x-input-label for="categories">Categories</x-input-label>
    <x-select.multiple class="block w-full" :options="$categories" :values="old('categories', $post->categories)" id="categories" name="categories" />
    <x-input-error :messages="$errors->get('categories')" class="mt-2" />
</div>

<div>
    <x-input-label for="content">Contenu</x-input-label>
    <x-textarea class="block w-full" value="{{$post->id ? $post->content : old('content')}}" id="content" name="content" />
    <x-input-error :messages="$errors->get('content')" class="mt-2" />
</div>

<x-primary-button>
    Sauvegarder
</x-primary-button>

</form>
