<div class="w-full shadow-sm border rounded-md">
    <div class="p-3 space-y-3">
        <h2 class="text-base font-semibold  text-gray-600 dark:text-gray-300">
            {{ Str::limit($document->title, 60) }}
        </h2>
        <p class="text-description">
            {{ Str::limit($document->description, 100) }}
        </p>

        @if ($document->id % 2 === 0)
        <x-secondary-button :isLink="true" :href="route('document.index', ['id' => $document->id])">
            En savoir plus
        </x-secondary-button>
        @else
        <x-primary-button :isLink="true" :href="route('document.index', ['id' => $document->id])">
            En savoir plus
        </x-primary-button>
        @endif
    </div>
</div>