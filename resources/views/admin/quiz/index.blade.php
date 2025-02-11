<x-admin-layout>
    <x-slot name="header">Gestion des quiz</x-slot>

    <div class="container py-12">
        <div class="container-center">

            <div class="mb-4">
                @include('shared.search-with-action', [
                'routeAction' => route('#quiz.create'),
                'countResult' => 12,
                'routeIndex' => route('#quiz.index')
                ])

                <div class="my-5">
                    <x-table.container>
                        <x-table.header>
                            <x-table.row>
                                <x-table.head>Nom</x-table.head>
                                <x-table.head>Description</x-table.head>
                                <x-table.head>Articles</x-table.head>
                                <x-table.head class="text-end">Actions</x-table.head>
                            </x-table.row>
                        </x-table.header>
                        <x-table.body>
                            @foreach ($quizzes as $quiz)
                            <x-table.row>
                                <x-table.cell>
                                    <a href="{{ route('#quiz.show', ['id' => $quiz->id]) }}" class="hover:underline">
                                        {{ Str::limit($quiz->question, 20) }}
                                    </a>
                                </x-table.cell>


                                <x-table.cell>
                                    <a href="{{ route('#quiz.show', ['id' => $quiz->id]) }}" class="hover:underline">
                                        {{ Str::limit($quiz->answer, 30) }}
                                    </a>
                                </x-table.cell>

                                <x-table.cell>
                                    @include('shared.action-simple', [
                                    'routeEdit' => route('#quiz.edit', ['id' => $quiz->id]),
                                    'routeShow' => route('#quiz.show', ['id' => $quiz->id]),
                                    'routeDelete' => route('#quiz.destroy', ['id' => $quiz->id]),
                                    ])
                                </x-table.cell>
                            </x-table.row>
                            @endforeach
                        </x-table.body>
                    </x-table.container>
                </div>

                {{ $quizzes->links() }}
            </div>
        </div>
    </div>
</x-admin-layout>