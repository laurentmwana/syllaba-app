<form action="{{ route('card.add', ['courseDocumentId' => $courseDocument->id]) }}" method="post" onsubmit="return confirm('Voulez-vous vraimemtn ajouter ce support de cours dans le panier ? ')">
    @csrf
    <x-outline-button title="ajouter ce support de cours dans le panier" type="submit">
        Ajouter
    </x-outline-button>
</form>