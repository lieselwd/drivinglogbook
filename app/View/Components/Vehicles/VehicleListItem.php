<?php

namespace App\View\Components\Vehicles;

use App\Models\LogbookEntry;
use App\Models\Vehicle;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class VehicleListItem extends Component
{
    public function __construct(
        public Vehicle $vehicle
    ) {}

    public function render(): View
    {
        return view('components.vehicles.vehicle-list-item');
    }
}
