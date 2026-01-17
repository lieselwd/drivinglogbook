<?php

namespace App\Livewire\Logbook;

use App\Models\LogbookEntry;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class AllEntries extends Component
{
    use WithPagination;

    public bool $showPlaces = false;

    public function render()
    {
        return view('livewire.logbook.all-entries')
            ->layout('components.layouts.drawer');
    }

    #[Computed]
    public function entries()
    {
        return LogbookEntry::whereUserId(auth()->user()->id)->orderBy('created_at', 'desc')->paginate(10);
    }
}
