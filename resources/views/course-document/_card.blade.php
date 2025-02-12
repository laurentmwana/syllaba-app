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
            <x-outline-button>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-plus-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0M8.5 8a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V12a.5.5 0 0 0 1 0v-1.5H10a.5.5 0 0 0 0-1H8.5z" />
                </svg>
                <span>Ajouter</span>
            </x-outline-button>

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