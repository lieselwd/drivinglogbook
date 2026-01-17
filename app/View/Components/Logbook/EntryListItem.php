<?php

namespace App\View\Components\Logbook;

use App\Data\LocationData;
use App\Models\LogbookEntry;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EntryListItem extends Component
{
    public function __construct(
        public LogbookEntry $logbookEntry,
        public bool $showPlaces = false
    ) {}

    public function render(): View
    {
        return view('components.logbook.entry-list-item');
    }

    public function startLocation(): array|LocationData
    {
        return $this->logbookEntry->start_location;
    }

    public function finishLocation(): array|LocationData
    {
        return $this->logbookEntry->finish_location;
    }
}
