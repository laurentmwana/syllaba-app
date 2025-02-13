<x-base-layout :backRoute="route('welcome')">
    <x-slot name="header">Mon panier</x-slot>

    <div class="container py-12">
        <div class="container-center">

            <div class="flex items-center justify-between gap-3">
                @include('shared.search-with-action', [
                'countResult' => 12,
                'routeIndex' => route('card.index')
                ])

                <div class="flex items-center gap-3">
                    @include('card._remove-all')
                    @include('card._paid')
                </div>
            </div>

            <div class="my-5">
                <x-table.container>
                    <x-table.header>
                        <x-table.row>
                            <x-table.head>Support de cours</x-table.head>
                            <x-table.head>Quantité</x-table.head>
                            <x-table.head>Prix</x-table.head>
                            <x-table.head class="text-end">Actions</x-table.head>
                        </x-table.row>
                    </x-table.header>
                    <x-table.body>
                        @foreach ($cards as $card)
                        <x-table.row>
                            <x-table.cell>
                                <a href="{{ route('course-document.show', ['id' => $card->courseDocument->id, 'slug' => Str::slug($card->courseDocument->title)]) }}" class="hover:underline">
                                    {{ Str::limit($card->courseDocument->title, 20) }}
                                </a>
                            </x-table.cell>

                            <x-table.cell>
                                @include('shared.badge', [
                                'content' => $card->quantities,
                                'type' => 'outline'
                                ])
                            </x-table.cell>

                            <x-table.cell>
                                @include('shared.badge', [
                                'content' => formatAmount($card->prices) . "$",
                                'type' => 'outline'
                                ])
                            </x-table.cell>

                            <x-table.cell>
                                @include('shared.action-simple', [
                                'routeShow' => route('card.show', ['id' => $card->id]),
                                'routeDelete' => route('card.destroy', ['id' => $card->id]),
                                'routeEdit' => route('card.edit', ['id' => $card->id]),
                                ])
                            </x-table.cell>
                        </x-table.row>
                        @endforeach
                    </x-table.body>
                </x-table.container>
            </div>
        </div>
    </div>
</x-base-layout>