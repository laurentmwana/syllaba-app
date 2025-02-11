<form class="space-y-6"
    action="{{ $courseDocument->id ? route('#course-document.update', ['id' => $courseDocument->id]) : route('#course-document.store') }}" method="POST">

    @if($courseDocument->id)
    @method('PUT')
    <input type="hidden" name="id" value="{{ $courseDocument->id }}">
    @endif
    @csrf

    <div>
        <x-input-label for="title">Titre</x-input-label>
        <x-text-input class="block w-full" value="{{ $courseDocument->id ? $courseDocument->title : old('title') }}" id="title" name="title" />
        <x-input-error :messages="$errors->get('title')" class="mt-2" />
    </div>


    <div>
        <x-input-label for="star">Appréciation</x-input-label>
        <x-text-input class="block w-full" value="{{ $courseDocument->id ? $courseDocument->star : old('star') }}" id="star" name="star" />
        <x-input-error :messages="$errors->get('star')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="price">Prix</x-input-label>
        <x-text-input class="block w-full" value="{{ $courseDocument->id ? $courseDocument->price : old('price') }}" id="price" name="price" />
        <x-input-error :messages="$errors->get('price')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="course_id">Cours</x-input-label>
        <x-select.single class="block w-full" :options="$courses" :value="old('course_id', $courseDocument->course_id)" id="course_id" name="course_id" />
        <x-input-error :messages="$errors->get('course_id')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="year_academic_id">Année Académique</x-input-label>
        <x-select.single class="block w-full" :options="$yearAcademics" :value="old('year_academic_id', $courseDocument->year_academic_id)" id="year_academic_id" name="year_academic_id" />
        <x-input-error :messages="$errors->get('year_academic_id')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="description">Description</x-input-label>
        <x-textarea class="block w-full" value="{{$courseDocument->id ? $courseDocument->description : old('description')}}" id="description" name="description" />
        <x-input-error :messages="$errors->get('description')" class="mt-2" />
    </div>

    <x-primary-button>
        Sauvegarder
    </x-primary-button>

</form>