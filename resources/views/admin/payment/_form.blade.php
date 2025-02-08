<form class="space-y-6"
    action="{{ $payment->id ? route('#payment.update', ['id' => $payment->id]) : route('#payment.store') }}" method="POST">

    @if($payment->id)
    @method('PUT')
    <input type="hidden" name="id" value="{{ $payment->id }}">
    @endif
    @csrf


    <div>
        <x-input-label for="document_id">Etudiant</x-input-label>
        <x-select.single class="block w-full" :options="$students" :value="old('document_id', $payment->document_id)" id="document_id" name="document_id" />
        <x-input-error :messages="$errors->get('student_id')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="document_id">Document</x-input-label>
        <x-select.single class="block w-full" :options="$documents" :value="old('document_id', $payment->document_id)" id="document_id" name="document_id" />
        <x-input-error :messages="$errors->get('document_id')" class="mt-2" />
    </div>

    <x-primary-button>
        Sauvegarder
    </x-primary-button>

</form>