<x-admin-layout>
    <x-slot name="header">Gestion des comments</x-slot>

    <div class="container py-12">
        <div class="container-center">

            <div class="mb-4">
                @include('shared.search-with-action', [
                    'countResult' => 12,
                    'routeIndex' => route('#comment.index')
                ])

                <div class="my-5">
                    <x-table.container>
                        <x-table.header>
                            <x-table.row>
                                <x-table.head>Artcile</x-table.head>
                                <x-table.head>Utilisateur</x-table.head>
                                <x-table.head>Message</x-table.head>
                                <x-table.head>Status</x-table.head>
                                <x-table.head class="text-end">Actions</x-table.head>
                            </x-table.row>
                        </x-table.header>
                        <x-table.body>
                            @foreach ($comments as $comment)
                            <x-table.row>
                                <x-table.cell>
                                    <a href="{{ route('#post.show', ['id' => $comment->post->id]) }}" class="hover:underline">
                                        {{ Str::limit($comment->post->title, 20) }}
                                    </a>
                                </x-table.cell>

                                <x-table.cell>
                                    <a href="#" class="hover:underline">
                                        {{ Str::limit($comment->user->name, 20) }}
                                    </a>
                                </x-table.cell>

                                <x-table.cell>
                                    <a href="" class="hover:underline">
                                        {{ Str::limit($comment->message, 30) }}
                                    </a>
                                </x-table.cell>

                                <x-table.cell>
                                    @include('shared.badge', [
                                        'content' => $comment->status,
                                        'type' => 'outline'
                                    ])
                                </x-table.cell>

                                <x-table.cell>
                                    <div class="flex items-center justify-start lg:justify-end gap-3">
                                        @include('shared.action-simple', [
                                        'routeShow' => route('#comment.show', ['id' => $comment->id]),
                                        'routeDelete' => route('#comment.destroy', $comment),
                                    ])

                                        @include('shared.action-single', [
                                            'title' => "Changer le status",
                                            'routeAction' => route('#comment.lock', $comment),
                                        ])
                                    </div>
                                </x-table.cell>
                            </x-table.row>
                            @endforeach
                        </x-table.body>
                    </x-table.container>
                </div>

                {{ $comments->links() }}
            </div>
        </div>
    </div>
</x-admin-layout>
