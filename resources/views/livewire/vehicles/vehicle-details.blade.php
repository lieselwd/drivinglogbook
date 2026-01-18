<div>
    <x-slot:drawerPageTitle>
        {{ $vehicle->registration->plateNumber }}
    </x-slot:drawerPageTitle>
    <x-slot:navTitle>
        Viewing vehicle {{ $vehicle->registration->plateNumber }}
    </x-slot:navTitle>
    <div>
        <a href="{{ route('vehicles.all-vehicles') }}" wire:navigate class="btn btn-ghost">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
            </svg>
            All vehicles
        </a>
    </div>
    <div class="mx-4 mt-6 flex flex-col space-y-8">
        <div class="flex flex-row align-top space-x-6">
            <x-number-plate plate-number="{{ $vehicle->registration->plateNumber }}"/>
            <div class="flex flex-col space-y-2">
                <div class="text-3xl">{{ $vehicle->nickname }}</div>
                <div class="text-xl font-light">{{ $vehicle->model_year }} {{ $vehicle->make }} {{ $vehicle->model }}</div>
            </div>
        </div>
    </div>
</div>
