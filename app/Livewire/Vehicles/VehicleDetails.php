<?php

namespace App\Livewire\Vehicles;

use App\Models\Vehicle;
use Livewire\Attributes\Layout;
use Livewire\Component;

class VehicleDetails extends Component
{
    public Vehicle $vehicle;

    #[Layout('components.layouts.drawer')]
    public function render()
    {
        return view('livewire.vehicles.vehicle-details');
    }
}
