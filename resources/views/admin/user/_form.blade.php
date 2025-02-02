<form class="space-y-6"
    action="{{ $user->id ? route('#user.update', ['id' => $user->id]) : route('#user.store') }}" method="POST">

    @if($user->id)
    @method('PUT')
    <input type="hidden" name="id" value="{{ $user->id }}">
    @endif
    @csrf

    <div>
        <x-input-label for="name">Nom</x-input-label>
        <x-text-input class="block w-full" value="{{ $user->id ? $user->name : old('name') }}" id="name" name="name" />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>


    <div>
        <x-input-label for="email">Adresse e-mail</x-input-label>
        <x-text-input class="block w-full" value="{{ $user->id ? $user->email : old('email') }}" id="email" name="email" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="password" :value="__('Password')" />

        <x-text-input id="password" class="block w-full"
            type="password"
            name="password"
            required autocomplete="new-password" />

        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

        <x-text-input id="password_confirmation" class="block w-full"
            type="password"
            name="password_confirmation" required autocomplete="new-password" />

        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="student_id">Etudiant</x-input-label>
        <x-select.single class="block w-full" :options="$students" :value="old('student_id', $user->student_id)" id="student_id" name="student_id" />
        <x-input-error :messages="$errors->get('student_id')" class="mt-2" />
    </div>

    <x-primary-button>
        Sauvegarder
    </x-primary-button>

</form>