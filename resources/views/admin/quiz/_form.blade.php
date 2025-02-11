<form class="space-y-4"
    action="{{ $quiz->id ? route('#quiz.update', ['id' => $quiz->id]) : route('#quiz.store') }}" method="POST">

    @if($quiz->id)
    @method('PUT')
    <input type="hidden" name="id" value="{{ $quiz->id }}">
    @endif
    @csrf


    <div>
        <x-input-label for="question">Question</x-input-label>
        <x-textarea class="block w-full" value="{{$quiz->id ? $quiz->question : old('question')}}" id="question" name="question" />
        <x-input-error :messages="$errors->get('question')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="answer">Réponse</x-input-label>
        <x-textarea class="block w-full" value="{{$quiz->id ? $quiz->answer : old('answer')}}" id="answer" name="answer" />
        <x-input-error :messages="$errors->get('answer')" class="mt-2" />
    </div>

    <x-primary-button>
        Sauvegarder
    </x-primary-button>

</form>