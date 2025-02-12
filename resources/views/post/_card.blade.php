<div class="w-full shadow-sm border rounded-md">
    <div>
        <img src="{{ getGenerateUrlToStorage($post->image) }}" alt="" class="block w-full">
    </div>
    <div class="p-3 space-y-3">
        <h2 class="text-base font-semibold  text-gray-600 dark:text-gray-300">
            {{ Str::limit($post->title, 60) }}
        </h2>
        <p class="text-description">
            {{ Str::limit($post->description, 100) }}
        </p>

        <div class="flex items-center justify-between gap-3">

            <div class="flex items-center gap-3">
                <a href="{{ route('post.show', ['id' => $post->id, 'slug' => Str::slug($post->title)]) }}#author">

                </a>

                <a href="{{ route('post.show', ['id' => $post->id, 'slug' => Str::slug($post->title)]) }}#author">

                </a>
            </div>

            <div>
                <a class="text-description text-[11px] " href="{{ route('post.show', ['id' => $post->id, 'slug' => Str::slug($post->title)]) }}#author">
                    Auteur : <span class="hover:underline">{{ Str::limit($post->user->name, 30) }}</span>
                </a>
            </div>
        </div>

        @if ($post->id % 2 === 0)
        <x-secondary-button :isLink="true" :href="route('post.show', ['id' => $post->id, 'slug' => Str::slug($post->title)])">
            En savoir plus
        </x-secondary-button>
        @else
        <x-primary-button :isLink="true" :href="route('post.show', ['id' => $post->id, 'slug' => Str::slug($post->title)])">
            En savoir plus
        </x-primary-button>
        @endif
    </div>
</div>