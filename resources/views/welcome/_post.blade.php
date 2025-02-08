<div class="container-center">
    <div class="mt-16">

        @include('shared.section-title', [
        'title' => 'Dernièrs articles',
        'size' => "xl",
        'align' => 'center',
        "separator" => false,
        "subtitle" => "Voici nos derniers articles publiés recensemment"
        ])

        @if ($posts->count() > 0)

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($posts as $post)
            @include('post._card', [
            'title' => $post->title,
            'description' => $post->content
            ])
            @endforeach
        </div>
        @else

        @include('shared.alert', ['message' => "🌟 Les articles ne sont pas disponibles 🙏"])

        @endif

    </div>
</div>