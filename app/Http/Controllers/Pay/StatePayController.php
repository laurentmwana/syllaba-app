<?php

namespace App\Http\Controllers\Pay;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Services\Payment\MpesaMobileMoney;
use Illuminate\Http\Request;

class StatePayController extends Controller
{
    public function pay(Request $request, MpesaMobileMoney $mpesa)
    {
        $studentId = $request->user()->student_id;

        $cards = Card::with(['courseDocument', 'student', 'courseDocument.tomes'])
            ->where('student_id', '=', $studentId)
            ->where('completed', '=', false)
            ->get();


        $$mpesa->pay($cards);
    }
}
