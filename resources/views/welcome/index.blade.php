<x-base-layout>
    @include('shared.hero')

    <div class="container">
        @include('welcome._document', ['documents' => $documents])
        @include('welcome._post', ['posts' => $posts])
    </div>
</x-base-layout>