<?php

namespace App\Livewire\Logbook;

use App\Models\Logbook;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class CreateEntry extends Component
{
    public $logbooks;
    public $selectedLogbook;

    public function mount()
    {
        $this->logbooks = Auth::user()->logbooks;
    }


    #[Layout('components.layouts.drawer')]
    public function render()
    {
        return view('livewire.logbook.create-entry');
    }

    public function setLogbook($id)
    {
        $this->selectedLogbook = Auth::user()->logbooks->find($id);
    }

    public function clearLogbook()
    {
        $this->selectedLogbook = null;
    }
}
