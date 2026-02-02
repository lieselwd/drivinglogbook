<?php

namespace App\Enums;

enum PasswordValidatorRules: string
{
    case MIN = 'pwmin';
    case MIXED = 'pwmixed';
    case LETTERS = 'pwletters';
    case NUMBERS = 'pwnumbers';
    case SYMBOLS = 'pwsymbols';
    case UNCOMP = 'pwuncomp';
}
