<?php

use App\Helpers\AuthHelper;

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
