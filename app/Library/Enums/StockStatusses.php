<?php
namespace App\Http\Library\Enums;

enum StockStatusses: int
{
    case IN_STOCK = true;
    case OUT_OF_STOCK = false;

    /**
     * Get the name of the status.
     *
     * @return string
     */
    public function label(): string
    {
        return match($this) {
            self::IN_STOCK => 'In Stock',
            self::OUT_OF_STOCK => 'Out Of Stock',
        };
    }
}