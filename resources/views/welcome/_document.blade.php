<div class="container py-16">
    <div class="container-center">

        @include('shared.section-title', [
        'title' => 'Dernièrs documents',
        'size' => "xl",
        'align' => 'center',
        "separator" => false,
        "subtitle" => "Voici nos derniers articles publiés recensemment"
        ])

        @if ($courseDocuments->count() > 0)

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($courseDocuments as $courseDocument)
            @include('course-document._card', ['courseDocument' => $courseDocument])
            @endforeach
        </div>
        @else

        <div class="text-center">
            @include('shared.alert', ['message' => "🌟 Les documents ne sont pas disponibles 🙏"])
        </div>
        @endif
    </div>
</div>