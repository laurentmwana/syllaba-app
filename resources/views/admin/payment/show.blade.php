<x-admin-layout :backRoute="route('#payment.index')">
    <x-slot name="header">
        En savoir plus sur le paiement #{{ $payment->id }}
    </x-slot>

    <div class="container py-12">
        <div class="container-center">
            <div class="container-card">
                <h2 class="text-xl font-semibold mb-3">
                    {{ $payment->status }}
                </h2>
            </div>
        </div>
    </div>
</x-admin-layout>