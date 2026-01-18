<?php

namespace App\Enums;

enum TransmissionTypes: int
{
    case AUTOMATIC = 0;
    case MANUAL = 1;

    public function friendlyName()
    {
        return match ($this) {
            TransmissionTypes::AUTOMATIC => 'Automatic',
            TransmissionTypes::MANUAL => 'Manual',
        };
    }
}
