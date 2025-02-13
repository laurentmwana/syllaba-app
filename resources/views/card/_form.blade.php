<form class="space-y-4"
    action="{{ route('card.update', ['id' => $card->id]) }}" method="POST">

    @method('PUT')
    <input type="hidden" name="id" value="{{ $card->id }}">
    @csrf

    <div>
        <x-input-label for="quantities">Quantité</x-input-label>
        <x-text-input class="block w-full" value="{{ $card->id ? $card->quantities : old('quantities') }}" id="quantities" name="quantities" />
        <x-input-error :messages="$errors->get('quantities')" class="mt-2" />
    </div>


    <div>
        <x-input-label for="prices">Montant</x-input-label>
        <x-text-input disabled="disabled" class="block w-full" value="{{ $card->id ? $card->prices : old('prices') }}" id="prices" name="prices" />
        <x-input-error :messages="$errors->get('prices')" class="mt-2" />
    </div>


    <div>
        <x-input-label for="course_document_id">Support de cours</x-input-label>
        <x-select.single class="block w-full" :options="$courseDocuments" :value="old('course_document_id', $card->course_document_id)" id="course_document_id" name="course_document_id" />
        <x-input-error :messages="$errors->get('course_document_id')" class="mt-2" />
    </div>



    <x-primary-button>
        Editer
    </x-primary-button>

</form>