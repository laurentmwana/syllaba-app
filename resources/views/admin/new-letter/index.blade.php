<x-admin-layout>
    <x-slot name="header">Gestion des newLetters</x-slot>

    <div class="container py-12">
        <div class="container-center">

            <div class="mb-4">
                @include('shared.search-with-action', [
                'countResult' => 12,
                'routeIndex' => route('#new-letter.index')
                ])

                <div class="my-5">
                    <x-table.container>
                        <x-table.header>
                            <x-table.row>
                                <x-table.head>Utilisateur</x-table.head>
                                <x-table.head>Status</x-table.head>
                                <x-table.head class="text-end">Actions</x-table.head>
                            </x-table.row>
                        </x-table.header>
                        <x-table.body>
                            @foreach ($newLetters as $newLetter)
                            <x-table.row>
                                <x-table.cell>
                                    <a href="{{ route('#user.show', ['id' => $newLetter->user->id]) }}" class="hover:underline">
                                        {{ Str::limit($newLetter->user->name, 50) }}
                                    </a>
                                </x-table.cell>

                                <x-table.cell>
                                    @include('shared.badge', [
                                    'type' => 'outline',
                                    'content' => $newLetter->status
                                    ])
                                </x-table.cell>



                                <x-table.cell>
                                    <div class="flex items-center gap-3 justify-end">
                                        @include('shared.action-single', [
                                        'routeAction' => route('#new-letter.change', ['id' => $newLetter->id]),
                                        'title' => "Changer le status"
                                        ])
                                        @include('shared.action-single', [
                                        'method' => 'DELETE',
                                        'routeAction' => route('#new-letter.destroy', ['id' => $newLetter->id]),
                                        'title' => 'Supprimer'
                                        ])
                                    </div>
                                </x-table.cell>
                            </x-table.row>
                            @endforeach
                        </x-table.body>
                    </x-table.container>
                </div>
                {{ $newLetters->links() }}
            </div>
        </div>
    </div>
</x-admin-layout>