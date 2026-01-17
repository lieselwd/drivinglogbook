<?php

namespace App\Enums;

enum LocationStates: string
{
    case SA = 'SA';
    case NSW = 'NSW';
    case VIC = 'VIC';
    case ACT = 'ACT';
    case TAS = 'TAS';
    case QLD = 'QLD';
    case NT = 'NT';
    case WA = 'WA';
    case OTHER = '';
}
