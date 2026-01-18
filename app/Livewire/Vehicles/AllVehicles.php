<?php

namespace App\Livewire\Vehicles;

use App\Models\Vehicle;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class AllVehicles extends Component
{
    use WithPagination;

    #[Layout('components.layouts.drawer')]
    public function render()
    {
        return view('livewire.vehicles.all-vehicles');
    }

    #[Computed]
    public function vehicles()
    {
        return Vehicle::whereUserId(auth()->user()->id)->paginate(8);
    }
}
