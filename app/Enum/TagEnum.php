<?php

namespace App\Enum;

enum TagEnum: string
{
    case SHOPPING = 'einkaufen';
    case DINING_OUT = 'essen gehen';
    case TRAVEL = 'reise';
    case EVENTS = 'events';
    case MEDICINE = 'medizin';
    case OTHER = 'sonstiges';

    public function color()
    {
        return match ($this) {
            self::SHOPPING => '#88AA99',
            self::DINING_OUT => '#6B9080',
            self::TRAVEL => '#A4C3B2',
            self::EVENTS => '#CCE3DE',
            self::MEDICINE => '#EAF4F4',
            self::OTHER => '#F6FFF8',
        };
    }
}
