<x-admin-layout>
    <x-slot name="header">Gestion des cours</x-slot>

    <div class="container py-12">
        <div class="container-center">

            <div class="mb-4">
                @include('shared.search-with-action', [
                'routeAction' => route('#course.create'),
                'countResult' => 12,
                'routeIndex' => route('#course.index')
                ])

                <div class="my-5">
                    <x-table.container>
                        <x-table.header>
                            <x-table.row>
                                <x-table.head>Nom</x-table.head>
                                <x-table.head>Support du cours</x-table.head>
                                <x-table.head>Professeur</x-table.head>
                                <x-table.head>Promotion</x-table.head>
                                <x-table.head class="text-end">Actions</x-table.head>
                            </x-table.row>
                        </x-table.header>
                        <x-table.body>
                            @foreach ($courses as $course)
                            <x-table.row>
                                <x-table.cell>
                                    <a href="{{ route('#course.show', ['id' => $course->id]) }}" class="hover:underline">
                                        {{ Str::limit($course->name, 50) }}
                                    </a>
                                </x-table.cell>

                                <x-table.cell>
                                    {{ $course->courseDocuments->count() }}
                                </x-table.cell>

                                <x-table.cell>
                                    <a href="{{ route('#professor.show', ['id' => $course->professor->id]) }}" class="hover:underline">
                                        {{ Str::limit(sprintf("%s - %s" , $course->professor->name, $course->professor->firstname), 20) }}
                                    </a>
                                </x-table.cell>

                                <x-table.cell>
                                    {{ $course->levels->count() }}
                                </x-table.cell>

                                <x-table.cell>
                                    @include('shared.action-simple', [
                                    'routeEdit' => route('#course.edit', ['id' => $course->id]),
                                    'routeShow' => route('#course.show', ['id' => $course->id]),
                                    'routeDelete' => route('#course.destroy', ['id' => $course->id]),
                                    ])
                                </x-table.cell>
                            </x-table.row>
                            @endforeach
                        </x-table.body>
                    </x-table.container>
                </div>

                {{ $courses->links() }}
            </div>
        </div>
    </div>
</x-admin-layout>