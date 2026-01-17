<?php

namespace App\Livewire\Logbook;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Dashboard extends Component
{
    #[Layout('components.layouts.drawer')]
    public function render()
    {
        return view('livewire.logbook.dashboard');
    }
}
