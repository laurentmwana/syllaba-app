<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentRequest;
use App\Models\Payment;

class AdminPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $payments = Payment::findPaginated();

        return view('admin.payment.index', [
            'payments' => $payments,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.payment.create', [
            'faculty' => new Payment(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PaymentRequest $request)
    {

        Payment::create($request->validated());

        return redirect()->route('#payment.index')
            ->with('message', "paiement créé.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $payment = Payment::findOrFail($id);

        return view('admin.payment.show', [
            'payment' => $payment,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $payment = Payment::findOrFail($id);

        return view('admin.payment.edit', [
            'payment' => $payment,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PaymentRequest $request, string $id)
    {
        $payment = Payment::findOrFail($id);

        $payment->update($request->validated());

        return redirect()->route('#payment.index')
            ->with('message', "paiement edité.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $payment = Payment::findOrFail($id);

        $payment->delete();

        return redirect()->route('#payment.index')
            ->with('message', "paiement supprimé.");
    }
}
