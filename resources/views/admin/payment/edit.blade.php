<x-admin-layout :backRoute="route('#payment.index')">
    <x-slot name="header">Editer le paiement #{{ $payment->id }}</x-slot>

    <div class="container py-12">
        <div class="container-center">
            <div class="container-card max-w-xl">
                <p class="text-description mb-3">
                    Remplissez ces champs pour modifier un paiement
                </p>
                @include('admin.payment._form', [
                'payment' => $payment,
                'students' => $students,
                'documents' => $documents,
                ])
            </div>
        </div>
    </div>
</x-admin-layout>