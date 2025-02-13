<x-base-layout>
    <x-slot name="header">Les syllabus</x-slot>

    <div class="container py-12">
        <div class="container-center">

            @include('shared.search-with-action', [
            'countResult' => 12,
            'routeIndex' => route('course-document.index')
            ])

            <div class="grid lg:grid-cols-4 gap-3 items-start my-5">
                <div class="container-card">
                    <h2 class="mb-3">
                        Filtres
                    </h2>

                    @include('course-document._filter', [
                        'courses' => $courses,
                        'years' => $years,
                        ])
                </div>

                <div class="lg:col-span-3">
                    <div class="grid  grid-cols-1 lg:grid-cols-2 gap-4">
                        @foreach ($courseDocuments as $courseDocument)
                        @include('course-document._card', ['courseDocument' => $courseDocument])
                        @endforeach
                    </div>
                </div>
            </div>

            {{ $courseDocuments->links() }}

        </div>
    </div>
</x-base-layout>