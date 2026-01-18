<div>
    <div class="card-body">
        <h2 class="card-title">
            <x-number-plate plate-number="{{ $vehicle->registration->plateNumber }}"/>
            <h2 class="text-2xl font-semibold mt-2">{{ $vehicle->nickname }}</h2>
            <h3 class="text-xl">{{ $vehicle->model_year }} {{ $vehicle->make  }} {{ $vehicle->model }}</h3>
        </h2>
        <p>Last entry:</p>
        @if ($vehicle->logbookEntries->count() >= 1)
            <div class="list rounded-box border border-base-300">
                <x-logbook.entry-list-item :logbook-entry="$vehicle->logbookEntries()->latest()->first()"/>
            </div>
        @endif
    </div>
</div>
