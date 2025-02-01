<div class="container-center">
    <div class="mt-16">

        <x-section-title
            size="sm">
            Dernièrs articles
        </x-section-title>

        @if ($posts->count() > 0)

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">

        </div>
        @else

        @include('shared.alert', ['message' => "🌟 Les formations ne sont pas disponibles 🙏"])

        @endif

    </div>
</div>