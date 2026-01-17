<div>
    <li class="list-row">
        <div>
            <div class="flex flex-col justify-items-center text-center border-1 border-base-300 p-2 w-15 rounded-md">
                <div class="text-sm">
                    {{ $logbookEntry->start_datetime->shortEnglishMonth }}
                </div>
                <div class="text-lg text-primary font-bold">
                    {{ $logbookEntry->start_datetime->format('d') }}
                </div>
            </div>
        </div>
        <div>
            <a class="text-xl link" href="{{ route('logbook.entry-details', $logbookEntry) }}">
                {{ $showPlaces ? $startLocation->placeName : $startLocation->suburb }} to {{ $showPlaces ? $finishLocation->placeName : $finishLocation->suburb }}
            </a>
            <div>
                {{ $logbookEntry->start_datetime->format('h:i A') }} - {{ $logbookEntry->end_datetime->isSameDay($logbookEntry->start_datetime) ? $logbookEntry->end_datetime->format('h:i A') : $logbookEntry->end_datetime->format('d M, h:i A (+1)') }}
            </div>
            <div class="text-sm opacity-75">KLB693</div>
        </div>
        <button class="btn btn-square btn-ghost">
            <svg class="size-[1.2em]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g stroke-linejoin="round" stroke-linecap="round" stroke-width="2" fill="none" stroke="currentColor"><path d="M6 3L20 12 6 21 6 3z"></path></g></svg>
        </button>
        <button class="btn btn-square btn-ghost">
            <svg class="size-[1.2em]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g stroke-linejoin="round" stroke-linecap="round" stroke-width="2" fill="none" stroke="currentColor"><path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"></path></g></svg>
        </button>
    </li>
</div>
