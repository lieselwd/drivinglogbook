<?php

namespace App\Data;

use App\Enums\LocationStates;
use Livewire\Wireable;
use Spatie\LaravelData\Concerns\WireableData;
use Spatie\LaravelData\Data;

class RegistrationData extends Data implements Wireable
{
    use WireableData;

    public function __construct(
        public string $plateNumber,
        public LocationStates $state,
    )
    {
    }
}
