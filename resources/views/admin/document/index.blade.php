<x-admin-layout>
    <x-slot name="header">Gestion des documents</x-slot>

    <div class="container py-12">
        <div class="container-center">

            <div class="mb-4">
                @include('shared.search-with-action', [
                'routeAction' => route('#document.create'),
                'countResult' => 12,
                'routeIndex' => route('#document.index')
                ])

                <div class="my-5">
                    <x-table.container>
                        <x-table.header>
                            <x-table.row>
                                <x-table.head>Titre</x-table.head>
                                <x-table.head>Prix</x-table.head>
                                <x-table.head>Document</x-table.head>
                                <x-table.head>Promotions</x-table.head>
                                <x-table.head class="text-end">Actions</x-table.head>
                            </x-table.row>
                        </x-table.header>
                        <x-table.body>
                            @foreach ($documents as $document)
                            <x-table.row>
                                <x-table.cell>
                                    <a href="{{ route('#document.show', ['id' => $document->id]) }}" class="hover:underline">
                                        {{ Str::limit($document->title, 50) }}
                                    </a>
                                </x-table.cell>


                                <x-table.cell>
                                    <a href="{{ route('#document.show', ['id' => $document->id]) }}" class="hover:underline">
                                        {{ Str::limit($document->price, 50) }}$
                                    </a>
                                </x-table.cell>

                                <x-table.cell>
                                    @include('shared.badge',
                                    [
                                    'type' => 'outline',
                                    'content' => getExtensionName($document->file)])
                                </x-table.cell>

                                <x-table.cell>
                                    @include('shared.badge', [
                                    'type' => 'outline',
                                    'content' => $document->levels->count()])
                                </x-table.cell>

                                <x-table.cell>
                                    @include('shared.action-simple', [
                                    'routeEdit' => route('#document.edit', ['id' => $document->id]),
                                    'routeShow' => route('#document.show', ['id' => $document->id]),
                                    'routeDelete' => route('#document.destroy', ['id' => $document->id]),
                                    ])
                                </x-table.cell>
                            </x-table.row>
                            @endforeach
                        </x-table.body>
                    </x-table.container>
                </div>

                {{ $documents->links() }}
            </div>
        </div>
    </div>
</x-admin-layout>