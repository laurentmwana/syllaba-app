<form action="{{ route('card.remove-all') }}" method="post" onsubmit="return confirm('Voulez-vous vraiment vider ce panier ? ')">
    @csrf
    <x-outline-button title="Vider ce panier" type="submit">
        Vider le panier
    </x-outline-button>
</form>