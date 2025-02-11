<x-admin-layout>
    <x-slot name="header">Gestion des support de cours</x-slot>

    <div class="container py-12">
        <div class="container-center">

            <div class="mb-4">
                @include('shared.search-with-action', [
                'routeAction' => route('#course-document.create'),
                'countResult' => 12,
                'routeIndex' => route('#course-document.index')
                ])

                <div class="my-5">
                    <x-table.container>
                        <x-table.header>
                            <x-table.row>
                                <x-table.head>Titre</x-table.head>
                                <x-table.head>Prix</x-table.head>
                                <x-table.head>Etoiles</x-table.head>
                                <x-table.head>Cours</x-table.head>
                                <x-table.head>Tome</x-table.head>
                                <x-table.head>Année académique</x-table.head>
                                <x-table.head class="text-end">Actions</x-table.head>
                            </x-table.row>
                        </x-table.header>
                        <x-table.body>
                            @foreach ($courseDocuments as $courseDocument)
                            <x-table.row>
                                <x-table.cell>
                                    <a href="{{ route('#course-document.show', ['id' => $courseDocument->id]) }}" class="hover:underline">
                                        {{ Str::limit($courseDocument->title, 50) }}
                                    </a>
                                </x-table.cell>

                                <x-table.cell>
                                    <a href="{{ route('#course-document.show', ['id' => $courseDocument->id]) }}" class="hover:underline">
                                        {{ formatAmount($courseDocument->price) }}$
                                    </a>
                                </x-table.cell>

                                <x-table.cell>
                                    @include('shared.badge', [
                                    'type' => 'outline',
                                    'content' => $courseDocument->star])
                                </x-table.cell>

                                <x-table.cell>
                                    <a href="{{ route('#course.show', ['id' => $courseDocument->course_id]) }}" class="hover:underline">
                                        {{ Str::limit($courseDocument->course->name, 50) }}
                                    </a>
                                </x-table.cell>


                                <x-table.cell>
                                    @include('shared.badge', [
                                    'type' => 'outline',
                                    'content' => $courseDocument->tomes->count()])
                                </x-table.cell>

                                <x-table.cell>
                                    <a href="{{ route('#year-academic.show', ['id' => $courseDocument->year_academic_id]) }}" class="hover:underline">
                                        {{ Str::limit(sprintf("%s-%s", $courseDocument->yearAcademic->start, $courseDocument->yearAcademic->end), 50) }}
                                    </a>
                                </x-table.cell>

                                <x-table.cell>
                                    @include('shared.action-simple', [
                                    'routeEdit' => route('#course-document.edit', ['id' => $courseDocument->id]),
                                    'routeShow' => route('#course-document.show', ['id' => $courseDocument->id]),
                                    'routeDelete' => route('#course-document.destroy', ['id' => $courseDocument->id]),
                                    ])
                                </x-table.cell>
                            </x-table.row>
                            @endforeach
                        </x-table.body>
                    </x-table.container>
                </div>

                {{ $courseDocuments->links() }}
            </div>
        </div>
    </div>
</x-admin-layout>