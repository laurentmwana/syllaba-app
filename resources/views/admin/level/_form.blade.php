<form class="space-y-6"
    action="{{ $level->id ? route('#level.update', ['id' => $level->id]) : route('#level.store') }}" method="POST">

    @if($level->id)
    @method('PUT')
    <input type="hidden" name="id" value="{{ $level->id }}">
    @endif
    @csrf

    <div>
        <x-input-label for="name">Nom</x-input-label>
        <x-text-input class="block w-full" value="{{ $level->id ? $level->name : old('name') }}" id="name" name="name" />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>


    <div>
        <x-input-label for="alias">Alias</x-input-label>
        <x-text-input class="block w-full" value="{{ $level->id ? $level->alias : old('alias') }}" id="alias" name="alias" />
        <x-input-error :messages="$errors->get('alias')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="option_id">Option</x-input-label>
        <x-select.single class="block w-full" :options="$options" :value="old('option_id', $level->option_id)" id="option_id" name="option_id" />
        <x-input-error :messages="$errors->get('option_id')" class="mt-2" />
    </div>

    <x-primary-button>
        Sauvegarder
    </x-primary-button>

</form>
