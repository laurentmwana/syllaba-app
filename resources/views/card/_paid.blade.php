<form action="" method="post" onsubmit="return confirm('Voulez-vous vraiment effectuer cette action ? ')">
    @csrf
    <x-primary-button title="Effectuer le paiement" type="submit">
        Payer
    </x-primary-button>
</form>