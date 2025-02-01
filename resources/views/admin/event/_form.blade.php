<form class="space-y-6"
    action="{{ $event->id ? route('#event.update', ['id' => $event->id]) : route('#event.store') }}" method="POST" enctype="multipart/form-data">

    @if($event->id)
    @method('PUT')
    <input type="hidden" name="id" value="{{ $event->id }}">
    @endif
    @csrf


    <div>
        <x-input-label for="image">Image</x-input-label>
        <x-text-input type="file" class="block w-full" id="image" name="image" />
        <x-input-error :messages="$errors->get('image')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="title">Titre</x-input-label>
        <x-text-input class="block w-full" value="{{ $event->id ? $event->title : old('title') }}" id="title" name="title" />
        <x-input-error :messages="$errors->get('title')" class="mt-2" />
    </div>


    <div>
        <x-input-label for="start_at">Débute</x-input-label>
        <x-text-input type="datetime-local" class="block w-full" value="{{ $event->id ? $event->start_at : old('start_at') }}" id="start_at" name="start_at" />
        <x-input-error :messages="$errors->get('start_at')" class="mt-2" />
    </div>



    <div>
        <x-input-label for="type">Type</x-input-label>
        <x-select.single class="block w-full" :options="$types" :value="old('type', $event->type)" id="type" name="type" />
        <x-input-error :messages="$errors->get('type')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="description">Description</x-input-label>
        <x-textarea class="block w-full" value="{{$event->id ? $event->description : old('description')}}" id="description" name="description" />
        <x-input-error :messages="$errors->get('description')" class="mt-2" />
    </div>

    <x-primary-button>
        Sauvegarder
    </x-primary-button>

</form>