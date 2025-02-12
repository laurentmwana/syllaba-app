<?php

use App\Helpers\AuthHelper;
use App\Services\Directory\ResolvePathStorage;
use App\Services\Number\NumberFormatter;
use Illuminate\Support\Number;

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
    return app(ResolvePathStorage::class)->getUrl($path);
}

function getExtensionName(string $file, string $default = "PDF"): string
{
    return strtoupper(pathinfo($file)['extension'] ?? $default);
}


function formatAmount(float|int $amount): string
{
    return Number::format($amount, 2, 4);
}
