<form class="space-y-4"
    action="{{ route('contact.send') }}" method="POST">
    @csrf

    <div>
        <x-input-label for="name">Nom</x-input-label>
        <x-text-input class="block w-full" value="{{ $contact->id ? $contact->name : old('name') }}" id="name" name="name" />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="email">Adresse e-mail</x-input-label>
        <x-text-input class="block w-full" value="{{ $contact->id ? $contact->email : old('email') }}" id="email" name="email" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>


    <div>
        <x-input-label for="subject">Motif</x-input-label>
        <x-textarea class="block w-full" value="{{$contact->id ? $contact->subject : old('subject')}}" id="subject" name="subject" />
        <x-input-error :messages="$errors->get('subject')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="message">Message</x-input-label>
        <x-textarea class="block w-full" value="{{$contact->id ? $contact->message : old('message')}}" id="message" name="message" />
        <x-input-error :messages="$errors->get('message')" class="mt-2" />
    </div>

    <x-primary-button>
        Envoyer
    </x-primary-button>

</form>