<x-base-layout>
    @include('shared.hero')

    @include('welcome._event', ['event' => $event])
    @include('welcome._document', ['courseDocuments' => $courseDocuments])
    @include('welcome._post', ['posts' => $posts])
    @include('welcome._new-letter')
    @include('welcome._quiz', ['quizzes' => $quizzes])
</x-base-layout>