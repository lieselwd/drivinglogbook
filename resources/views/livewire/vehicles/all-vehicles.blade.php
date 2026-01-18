<div>
    <x-slot:drawerPageTitle>
        All vehicles
    </x-slot:drawerPageTitle>
    <x-slot:navTitle>
        All vehicles
    </x-slot:navTitle>
    <div>
        <div class="grid lg:grid-cols-2 gap-4">
            @foreach ($this->vehicles() as $vehicle)
                <div class="card card-border w-full rounded-box border border-base-300">
                    <div>
                        <x-vehicles.vehicle-list-item :vehicle="$vehicle"/>
                    </div>
                    <div class="card-body pt-0">
                        <div class="card-actions justify-end">
                            <a href="{{ route('vehicles.vehicle-details', $vehicle) }}" wire:navigate class="btn btn-primary">View</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $this->vehicles()->links() }}
    </div>
</div>
