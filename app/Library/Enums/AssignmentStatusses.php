<?php
namespace App\Library\Enums;

enum AssignmentStatusses: int
{
    case ACTIVE = 1;
    case PASSIVE = 0;

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