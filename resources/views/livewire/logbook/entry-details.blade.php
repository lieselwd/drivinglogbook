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
                    <div class="bg-base-200 overflow-x-auto rounded-box border border-base-content/5">
                        <table class="table">
                            <!-- head -->
                            <th class="w-2/6">Date and time</th>
                            <th class="flex flex-row justify-end p-2">
                                <button class="btn btn-circle">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-[1.2em]">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                    </svg>
                                </button>
                            </th>
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
                <div class="mt-4 md:mt-0 grow">
                    <div class="skeleton w-full h-90 animate-none"></div>
                    {{--                    <livewire:mapbox-start-finish :logbookEntry="$logbookEntry" mapHeight="300px"/>--}}
                </div>
            </div>
            <div class="md:columns-2">
                <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-200">
                    <table class="table">
                        <thead>
                        <th class="w-2/6">Vehicle</th>
                        <th class="flex flex-row justify-end p-2">
                            <button class="btn btn-circle">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-[1.2em]">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                            </button>
                        </th>
                        </thead>
                        <tbody>
                        <tr>
                            <th>Registration</th>
                            <td>
                                <div class="w-1/4 text-center">
                                    <x-number-plate plate-number="{{ $logbookEntry->vehicle->registration->plateNumber }}"/>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>Make / Model</th>
                            <td>
                                {{ $logbookEntry->vehicle->getFriendlyName() }}
                            </td>
                        </tr>
                        <tr>
                            <th>Odometer</th>
                            <td>
                                <p>
                                    <span class="font-mono">99,241</span> <span class="label">start</span><br/>
                                    <span class="font-mono">99,341</span> <span class="label">finish (+100)</span>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>

                            </td>
                            <td class="flex flex-row justify-end">
                                <a href="{{ route('vehicles.vehicle-details', $logbookEntry->vehicle) }}" wire:navigate class="btn btn-secondary btn-sm">
                                    View vehicle
                                </a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="w-1/2">
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Description</legend>
                    <textarea readonly class="textarea h-28 w-full" placeholder="Description of your trip"></textarea>
                    <div class="label">Optional</div>
                </fieldset>
            </div>
        </div>
    </div>
</div>
