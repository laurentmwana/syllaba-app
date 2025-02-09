<?php

use App\Helpers\AuthHelper;
use App\Services\Number\NumberFormatter;

function isAdmin(string $role): bool
{
    return AuthHelper::isAdmin($role);
}

function isStudent(string $role): bool
{
    return AuthHelper::isStudent($role);
}


function getGenerateUrlToStorage(string $path): string
{
    return str_contains("http", $path)
        ? $path
        : "/storage/$path";
}

function getExtensionName(string $file, string $default = "PDF"): string
{
    return strtoupper(pathinfo($file)['extension'] ?? $default);
}


function formatAmount(float|int $amount): string
{
    return NumberFormatter::formatAmount($amount);
}
