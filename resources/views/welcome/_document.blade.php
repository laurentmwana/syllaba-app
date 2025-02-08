<div class="container-center">
    <div class="mt-16">

        @include('shared.section-title', [
        'title' => 'Dernièrs documents',
        'size' => "xl",
        'align' => 'center',
        "separator" => false,
        "subtitle" => "Voici nos derniers articles publiés recensemment"
        ])

        @if ($documents->count() > 0)

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($documents as $document)
            @include('document._card', ['document' => $document])
            @endforeach
        </div>
        @else

        <div class="text-center">
            @include('shared.alert', ['message' => "🌟 Les documents ne sont pas disponibles 🙏"])
        </div>
        @endif

    </div>
</div>