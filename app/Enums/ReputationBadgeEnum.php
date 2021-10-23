<?php

namespace App\Enums ;

class ReputationBadgeEnum extends  Enum
{
    const RED = 1;
    const ORANGE = 2;
    const GREEN = 3;

    public static $reputation_badges =[
        self::RED  => 'Red',
        self::ORANGE => 'Orange',
        self::GREEN => 'Green',
    ];
}
