<x-base-layout>
    @include('shared.hero')


    <div class="container">
        @include('welcome.post', ['posts' => $posts])
    </div>
</x-base-layout>
