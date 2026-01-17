<div>
    <x-slot:drawerPageTitle>
        All logbook entries
    </x-slot:drawerPageTitle>
    <x-slot:navTitle>
        All logbook entries
    </x-slot:navTitle>
    <div>
        <fieldset class="fieldset bg-base-100 border-base-300 rounded-box w-64 border p-4">
            <legend class="fieldset-legend">Options</legend>
            <label class="label">
                <input wire:model.live="showPlaces" type="checkbox" checked="checked" class="checkbox" />
                Show place names instead of suburbs
            </label>
        </fieldset>
        <ul class="list bg-base-100 rounded-box border border-base-300 my-3">
            @foreach ($this->entries() as $entry)
                <x-logbook.entry-list-item :logbook-entry="$entry" :showPlaces="$showPlaces"/>
            @endforeach
        </ul>
        {{ $this->entries()->links() }}
    </div>

</div>
