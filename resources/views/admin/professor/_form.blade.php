<form class="space-y-6"
    action="{{ $professor->id ? route('#professor.update', ['id' => $professor->id]) : route('#professor.store') }}" method="POST">

    @if($professor->id)
    @method('PUT')
    <input type="hidden" name="id" value="{{ $professor->id }}">
    @endif
    @csrf

    <div>
        <x-input-label for="departments">Départements</x-input-label>
        <x-select.multiple class="block w-full" :options="$departments" :values="old('departments', $professor->departments)" id="departments" name="departments" />
        <x-input-error :messages="$errors->get('departments')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="name">Nom</x-input-label>
        <x-text-input class="block w-full" value="{{ $professor->id ? $professor->name : old('name') }}" id="name" name="name" />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>


    <div>
        <x-input-label for="firstname">Postnom</x-input-label>
        <x-text-input class="block w-full" value="{{ $professor->id ? $professor->firstname : old('firstname') }}" id="firstname" name="firstname" />
        <x-input-error :messages="$errors->get('firstname')" class="mt-2" />
    </div>


    <div>
        <x-input-label for="lastname">Prénom</x-input-label>
        <x-text-input class="block w-full" value="{{ $professor->id ? $professor->lastname : old('lastname') }}" id="lastname" name="lastname" />
        <x-input-error :messages="$errors->get('lastname')" class="mt-2" />
    </div>


    <div>
        <x-input-label for="phone">Téléphone</x-input-label>
        <x-text-input class="block w-full" value="{{ $professor->id ? $professor->phone : old('phone') }}" id="phone" name="phone" />
        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
    </div>


    <div>
        <x-input-label for="email">Adresse e-mail</x-input-label>
        <x-text-input class="block w-full" value="{{ $professor->id ? $professor->email : old('email') }}" id="email" name="email" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>


    <div>
        <x-input-label for="gender">Sexe</x-input-label>
        <x-select.single class="block w-full" :options="$genders" :value="old('gender', $professor->gender)" id="gender" name="gender" />
        <x-input-error :messages="$errors->get('gender')" class="mt-2" />
    </div>

    <x-primary-button>
        Sauvegarder
    </x-primary-button>

</form>