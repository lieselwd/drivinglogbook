<?php

namespace App\Data;

use App\Enums\LocationStates;
use Livewire\Wireable;
use Spatie\LaravelData\Attributes\Computed;
use Spatie\LaravelData\Concerns\WireableData;
use Spatie\LaravelData\Optional;
use Spatie\LaravelData\Data;

class LocationData extends Data implements Wireable
{
    use WireableData;

    #[Computed]
    public string $placeName;
    #[Computed]
    public string $searchQuery;

    public function __construct(
        public string $suburb,
        public LocationStates $state,
        public string|Optional $place,
        public string|Optional $postcode,
        public string|Optional $lat,
        public string|Optional $long,
    )
    {
        $this->placeName = gettype($this->place) == 'string' ? $this->place : $this->suburb;
        $this->searchQuery = "{$this->placeName} {$this->suburb} {$this->state->value}";
    }
}
