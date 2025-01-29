<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class NumberPhoneRule implements ValidationRule
{
    private const NUMBER_PREFFIX = ['82', '81', '85', '99', '98', '80', '89'];

    private const NUMBER_LEN = 9;

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $prefix = substr($value, 0, 2);

        if (!in_array($prefix, self::NUMBER_PREFFIX)) {
            $fail(sprintf("les deux premier chiffres doivent commencés par : %s", join(', ', self::NUMBER_PREFFIX)));
        }

        $len  = strlen($value);

        if ($len !== self::NUMBER_LEN) {
            $fail(sprintf("{$attribute} doit avoir %s", self::NUMBER_LEN));
        }
    }
}
