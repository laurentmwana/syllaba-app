<div class="w-full shadow-sm border rounded-md">
    <div class="p-3 space-y-3">
        <h2 class="text-base font-semibold  text-gray-600 dark:text-gray-300">
            {{ Str::limit($courseDocument->title, 60) }}
        </h2>
        <p class="text-description mb-3">
            {{ Str::limit($courseDocument->description, 150) }}
        </p>

        <div class="flex justify-between gap-2 items-center">
            @include('shared.badge', [
            'content' => formatAmount($courseDocument->price) . "$"
            ])

            @include('shared.badge', [
            'type' => 'outline',
            'content' => "Tome : {$courseDocument->tomes->count()}"
            ])
        </div>

        <p class="text-description">
            Cours : {{ $courseDocument->course->name }}
        </p>
        <p class="text-description">
            Année académique : {{ $courseDocument->yearAcademic->start }}-{{ $courseDocument->yearAcademic->end }}
        </p>
        <div class="flex items-center gap-3 mb-4">
            @include('course-document._card-add', [
            'courseDocument' => $courseDocument
            ])

            @if ($courseDocument->id % 2 === 0)
            <x-secondary-button :isLink="true" :href="route('course-document.index', ['id' => $courseDocument->id, 'slug' => Str::slug($courseDocument->title)])">
                En savoir plus
            </x-secondary-button>
            @else
            <x-primary-button :isLink="true" :href="route('course-document.index', ['id' => $courseDocument->id, 'slug' => Str::slug($courseDocument->title)])">
                En savoir plus
            </x-primary-button>
            @endif

        </div>

    </div>
</div>