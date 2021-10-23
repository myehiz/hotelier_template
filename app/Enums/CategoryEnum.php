<?php
namespace App\Enums;

class CategoryEnum extends Enum
{
    const HOTEL = 1;
    const ALTERNATIVE = 2;
    const HOSTEL = 3;
    const LODGE = 4;
    const RESORT = 5;
    const GUEST_HOST = 6;

    public static $categories = [
        self::HOTEL => 'Hotel',
        self::ALTERNATIVE => 'Alternative',
        self::HOSTEL => 'Hostel',
        self::LODGE => 'Lodge',
        self::RESORT => 'Resorte',
        self::GUEST_HOST => 'Guest Host',
    ];
}
