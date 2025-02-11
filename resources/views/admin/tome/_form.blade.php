<form class="space-y-4"
    action="{{ $tome->id ? route('#tome.update', ['id' => $tome->id]) : route('#tome.store') }}"
    method="post" enctype="multipart/form-data">

    @if($tome->id)
    @method('PUT')
    <input type="hidden" name="id" value="{{ $tome->id }}">
    @endif
    @csrf

    <div>
        <x-input-label for="document">Document</x-input-label>
        <x-text-input type="file" class="block w-full" id="document" name="document" />
        <x-input-error :messages="$errors->get('document')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="course_document_id">Support de cours</x-input-label>
        <x-select.single class="block w-full" :options="$courseDocuments" :value="old('course_document_id', $tome->course_document_id)" id="course_document_id" name="course_document_id" />
        <x-input-error :messages="$errors->get('course_document_id')" class="mt-2" />
    </div>

    <x-primary-button>
        Sauvegarder
    </x-primary-button>

</form>