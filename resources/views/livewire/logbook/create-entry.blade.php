<div>
    <x-slot:drawerPageTitle>
        Create a logbook entry
    </x-slot:drawerPageTitle>
    <x-slot:navTitle>
        Create a logbook entry
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
                <div class="text-3xl">Create a logbook entry</div>
            </div>
            <div class="text-xl">Select a logbook</div>
            <ul class="list bg-base-100 rounded-box shadow-md">
                @foreach ($this->logbooks as $logbook)
                    <li x-on:click="$wire.setLogbook('{{$logbook->id}}')" wire:key="{{ $logbook->id }}" class="list-row @if($selectedLogbook?->id == $logbook->id) bg-accent/20  outline outline-accent @else hover:cursor-pointer active:bg-base-300 active:outline hover:bg-base-200 @endif transition">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                        </svg>
                        <div>
                            <div class="text-lg">{{ $logbook->name }}</div>
                            @if (! $selectedLogbook)
                                <div class="text-xs">{{ ucfirst($logbook->type->value) }} logbook - last updated {{ $logbook->updated_at?->diffForHumans() ?? 'never' }}</div>
                            @endif
                        </div>
                        @if ($selectedLogbook)
                            <div>
                                <button type="button" wire:key="{{ $logbook->id }}" x-on:click="$wire.clearLogbook(); $wire.$refresh()" class="btn">Edit</button>
                            </div>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
        {{ $selectedLogbook }}
    </div>
</div>
