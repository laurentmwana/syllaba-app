<form class="space-y-6"
    action="{{ $student->id ? route('#student.update', ['id' => $student->id]) : route('#student.store') }}" method="POST">

    @if($student->id)
    @method('PUT')
    <input type="hidden" name="id" value="{{ $student->id }}">
    @endif
    @csrf

    <div>
        <x-input-label for="name">Nom</x-input-label>
        <x-text-input class="block w-full" value="{{ $student->id ? $student->name : old('name') }}" id="name" name="name" />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>


    <div>
        <x-input-label for="firstname">Postnom</x-input-label>
        <x-text-input class="block w-full" value="{{ $student->id ? $student->firstname : old('firstname') }}" id="firstname" name="firstname" />
        <x-input-error :messages="$errors->get('firstname')" class="mt-2" />
    </div>


    <div>
        <x-input-label for="lastname">Prénom</x-input-label>
        <x-text-input class="block w-full" value="{{ $student->id ? $student->lastname : old('lastname') }}" id="lastname" name="lastname" />
        <x-input-error :messages="$errors->get('lastname')" class="mt-2" />
    </div>


    <div>
        <x-input-label for="phone">Téléphone</x-input-label>
        <x-text-input class="block w-full" value="{{ $student->id ? $student->phone : old('phone') }}" id="phone" name="phone" />
        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
    </div>


    <div>
        <x-input-label for="email">Adresse e-mail</x-input-label>
        <x-text-input class="block w-full" value="{{ $student->id ? $student->email : old('email') }}" id="email" name="email" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>


    <div>
        <x-input-label for="gender">Sexe</x-input-label>
        <x-select.single class="block w-full" :options="$genders" :value="old('gender', $student->gender)" id="gender" name="gender" />
        <x-input-error :messages="$errors->get('gender')" class="mt-2" />
    </div>

    <x-primary-button>
        Sauvegarder
    </x-primary-button>

</form>