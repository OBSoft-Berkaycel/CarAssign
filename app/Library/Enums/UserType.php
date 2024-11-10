<?php
namespace App\Http\Library\Enums;

enum UserTypes: int
{
    case SUPERADMIN = 1;
    case ADMIN = 2;
    case USER = 3;

    /**
     * Get the name of the status.
     *
     * @return string
     */
    public function label(): string
    {
        return match($this) {
            self::SUPERADMIN => 'Superadmin',
            self::ADMIN => 'Admin',
            self::USER => 'User',
        };
    }
}