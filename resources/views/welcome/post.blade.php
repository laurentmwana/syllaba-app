<div class="container-center">
    <div class="mt-16">

        @include('shared.section-title', [
        'title' => 'Dernièrs articles', 'align' => 'center'])

        @if ($posts->count() > 0)

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">

        </div>
        @else

        @include('shared.alert', ['message' => "🌟 Les formations ne sont pas disponibles 🙏"])

        @endif

    </div>
</div>