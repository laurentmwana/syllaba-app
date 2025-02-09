<?php

namespace App\Services\Number;

class NumberFormatter
{
    public static function formatAmount(float|int $amount): string
    {
        return '$' . number_format($amount, 2, '.', ',');
    }
}
