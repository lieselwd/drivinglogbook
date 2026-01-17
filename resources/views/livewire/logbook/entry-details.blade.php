<div>
    <x-slot:drawerPageTitle>
        Entry on {{ $logbookEntry->start_datetime->toFormattedDateString() }} from {{ $logbookEntry->start_location->placeName }} to {{ $logbookEntry->finish_location->placeName }}
    </x-slot:drawerPageTitle>
    <x-slot:navTitle>
        Viewing entry on {{ $logbookEntry->start_datetime->toFormattedDateString() }}
    </x-slot:navTitle>
    <div>
        <a href="{{ route('logbook.all-entries') }}" wire:navigate class="btn btn-ghost">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
            </svg>
            All entries
        </a>
        <div class="mx-4 mt-6 flex flex-col space-y-8">
            <div class="flex flex-col space-y-2">
                <div class="text-3xl">{{ $logbookEntry->start_location->suburb }} to {{ $logbookEntry->finish_location->suburb }}</div>
                <div class="text-xl font-light">{{ $logbookEntry->start_datetime->format('d M, h:i A') }} - {{ $logbookEntry->end_datetime->isSameDay($logbookEntry->start_datetime) ? $logbookEntry->end_datetime->format('h:i A') : $logbookEntry->end_datetime->format('d M, h:i A (+1)') }}</div>
            </div>
            <div class="md:columns-2">
                <div>
                    <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100">
                        <table class="table">
                            <!-- head -->
                            <thead>
                            </thead>
                            <tbody>
                            <tr>
                                <th>Start</th>
                                <td>
                                    <p>
                                        @if (gettype($logbookEntry->start_location->place) == 'string')
                                            {{ $logbookEntry->start_location->place }}<br/>
                                        @endif
                                        {{ $logbookEntry->start_location->suburb }}{{ gettype($logbookEntry->start_location->postcode) == 'string' ? ', ' . $logbookEntry->start_location->postcode : '' }}, {{ $logbookEntry->start_location->state }}
                                    </p>
                                    <br/>
                                    <p>
                                        {{ $logbookEntry->start_datetime->toFormattedDateString() }}
                                        <br>
                                        {{ $logbookEntry->start_datetime->toTimeString() }}
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <th>Finish</th>
                                <td>
                                    <p>
                                        @if (gettype($logbookEntry->finish_location->place) == 'string')
                                            {{ $logbookEntry->finish_location->place }}<br/>
                                        @endif
                                        {{ $logbookEntry->finish_location->suburb }}{{ gettype($logbookEntry->finish_location->postcode) == 'string' ? ', ' . $logbookEntry->finish_location->postcode : '' }}, {{ $logbookEntry->start_location->state }}
                                    </p>
                                    <br/>
                                    <p>
                                        {{ $logbookEntry->end_datetime->toFormattedDateString() }}
                                        <br>
                                        {{ $logbookEntry->end_datetime->toTimeString() }}
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    {{ $logbookEntry->start_datetime->diffInHours($logbookEntry->end_datetime) }} hours<br/>{{ number_format($logbookEntry->start_datetime->diffInMinutes($logbookEntry->end_datetime)) }} minutes
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="mt-4 md:mt-0">
                    <livewire:mapbox-start-finish :logbookEntry="$logbookEntry" mapHeight="300px"/>
                </div>
            </div>
        </div>
    </div>
</div>
