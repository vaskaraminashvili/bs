<?php

namespace App\Enums;

enum NewsStatus: string
{

    case Active = 'Active';
    case NotActive = 'Not Active';

    public function getColor() :string
    {
        return match ($this) {
            self::Active => 'success',
            self::NotActive => 'danger',
        };
    }

}
