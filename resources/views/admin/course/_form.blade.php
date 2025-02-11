<form class="space-y-6"
    action="{{ $course->id ? route('#course.update', ['id' => $course->id]) : route('#course.store') }}" method="POST">

    @if($course->id)
    @method('PUT')
    <input type="hidden" name="id" value="{{ $course->id }}">
    @endif
    @csrf

    <div>
        <x-input-label for="name">Nom</x-input-label>
        <x-text-input class="block w-full" value="{{ $course->id ? $course->name : old('name') }}" id="name" name="name" />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>


    <div>
        <x-input-label for="levels">Promotion</x-input-label>
        <x-select.multiple class="block w-full" :options="$levels" :values="old('levels', $course->levels)" id="levels" name="levels" />
        <x-input-error :messages="$errors->get('levels')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="professor_id">Professeur</x-input-label>
        <x-select.single class="block w-full" :options="$professors" :value="old('professor_id', $course->professor_id)" id="professor_id" name="professor_id" />
        <x-input-error :messages="$errors->get('professor_id')" class="mt-2" />
    </div>

    <x-primary-button>
        Sauvegarder
    </x-primary-button>

</form>