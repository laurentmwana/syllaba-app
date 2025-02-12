<div class="container py-16">
    <div class="container-center">
        @include('shared.section-title', [
        'title' => 'Questions fréquemment posées',
        'size' => "xl",
        'align' => 'center',
        "separator" => false,
        "subtitle" => "Voici nos derniers articles publiés recensemment"
        ])

        @if ($quizzes->count() > 0)

        <div class="mx-auto max-w-3xl" id="accordion">
            <div class="flex flex-col gap-4">
                @foreach ($quizzes as $quiz)
                <div id="accordion-item" class="border shadow-sm rounded-md p-3">
                    <h2 class="mb-3 text-base font-medium text-gray-700 dark:text-gray-200">
                        {{ $quiz->question }}
                    </h2>
                    <p class="text-description">
                        {{ $quiz->answer }}
                    </p>
                </div>
                @endforeach
            </div>
        </div>
        @else

        @include('shared.alert', ['message' => "🌟 Les quiz ne sont pas disponibles 🙏"])

        @endif
    </div>
</div>
</div>