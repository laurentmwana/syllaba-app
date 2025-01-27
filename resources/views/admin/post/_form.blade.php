<form class="space-y-4"
    action="{{ $post->id ? route('#post.update', ['id' => $post->id]) : route('#post.store') }}"
    method="post">

@if($post->id)
@method('PUT')
<input type="hidden" name="id" value="{{ $post->id }}">
@endif
@csrf

<div>
    <x-input-label for="name">Titre</x-input-label>
    <x-text-input class="block w-full" value="{{ $post->id ? $post->title : old('title') }}" id="title" name="title" />
    <x-input-error :messages="$errors->get('title')" class="mt-2" />
</div>

<x-primary-button>
    Sauvegarder
</x-primary-button>

</form>
