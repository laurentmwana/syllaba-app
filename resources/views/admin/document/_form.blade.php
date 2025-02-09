<form class="space-y-6"
    action="{{ $document->id ? route('#document.update', ['id' => $document->id]) : route('#document.store') }}" method="POST" enctype="multipart/form-data">

    @if($document->id)
    @method('PUT')
    <input type="hidden" name="id" value="{{ $document->id }}">
    @endif
    @csrf


    <div>
        <x-input-label for="file">Document</x-input-label>
        <x-text-input type="file" class="block w-full" id="file" name="file" />
        <x-input-error :messages="$errors->get('file')" class="mt-2" />
    </div>


    <div>
        <x-input-label for="title">Titre</x-input-label>
        <x-text-input class="block w-full" value="{{ $document->id ? $document->title : old('title') }}" id="title" name="title" />
        <x-input-error :messages="$errors->get('title')" class="mt-2" />
    </div>


    <div>
        <x-input-label for="price">Prix</x-input-label>
        <x-text-input class="block w-full" value="{{ $document->id ? $document->price : old('price') }}" id="price" name="price" />
        <x-input-error :messages="$errors->get('price')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="year_academics">Année académique</x-input-label>
        <x-select.multiple class="block w-full" :options="$yearAcademics" :values="old('year_academics', $document->year_academics)" id="year_academics" name="year_academics" />
        <x-input-error :messages="$errors->get('year_academics')" class="mt-2" />
    </div>


    <div>
        <x-input-label for="levels">Promotions</x-input-label>
        <x-select.multiple class="block w-full" :options="$levels" :values="old('levels', $document->levels)" id="levels" name="levels" />
        <x-input-error :messages="$errors->get('levels')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="description">Description</x-input-label>
        <x-textarea class="block w-full" value="{{$document->id ? $document->description : old('description')}}" id="description" name="description" />
        <x-input-error :messages="$errors->get('description')" class="mt-2" />
    </div>

    <x-primary-button>
        Sauvegarder
    </x-primary-button>

</form>