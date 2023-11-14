<?php

namespace App\Enums;

enum Condition: string
{
    case Sunny = 'Sunny';
    case Cloudy = 'Cloudy';
    case Rainy = 'Rainy';
    case Windy = 'Windy';
}
