<?php

namespace App\Enums;

enum Time: string
{
    case Vollzeit = 'Vollzeit';
    case Teilzeit = 'Teilzeit';

    public static function values(): array
    {
        return array_column(self::cases(), 'name', 'value');
    }
}