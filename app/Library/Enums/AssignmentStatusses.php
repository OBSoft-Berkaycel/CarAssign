<?php
namespace App\Library\Enums;

enum AssignmentStatusses: int
{
    case ACTIVE = true;
    case PASSIVE = false;

    /**
     * Get the name of the status.
     *
     * @return string
     */
    public function label(): string
    {
        return match($this) {
            self::ACTIVE => 'Active',
            self::PASSIVE => 'Passive',
        };
    }
}