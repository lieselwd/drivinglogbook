<?php

namespace App\Livewire\Logbook;

use App\Data\LocationData;
use App\Models\LogbookEntry;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\Layout;
use Livewire\Component;

class EntryDetails extends Component
{
    public LogbookEntry $logbookEntry;
    public LocationData $startMap;
    public LocationData $finishMap;

    public function mount()
    {

    }

    #[Layout('components.layouts.drawer')]
    public function render()
    {
        return view('livewire.logbook.entry-details');
    }
}
