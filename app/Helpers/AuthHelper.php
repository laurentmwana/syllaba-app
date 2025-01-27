<?php

namespace App\Helpers;

use App\Enums\RoleUserEnum;

abstract class AuthHelper
{
    public static function isAdmin(string $role): bool
    {
        return $role === RoleUserEnum::ADMIN->value;
    }

    public static function isStudent(string $role): bool
    {
        return $role === RoleUserEnum::STUDENT->value;
    }
}
