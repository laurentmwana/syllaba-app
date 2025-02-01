<?php

namespace App\Helpers;


final class TokenGenerator
{

    public static function alpha(int $lenght = 14): string
    {
        $alphabet = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

        return substr(str_shuffle(str_repeat($alphabet, 60)), 0, $lenght);
    }
}
