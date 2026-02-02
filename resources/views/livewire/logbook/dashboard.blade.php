<div>
    <x-slot:drawerPageTitle>
        Dashboard
    </x-slot:drawerPageTitle>
    <x-slot:navTitle>
        Dashboard
    </x-slot:navTitle>
    @if (! auth()->user()->hasVerifiedEmail())
        <div class="hero bg-accent/40">
            <div class="hero-content text-center">
                <div class="max-w-md">
                    <h1 class="text-2xl font-bold">Please verify your email address</h1>
                    <p class="py-6">
                        Logbook features are unavailable until you have verified.
                    </p>
                    <a href="{{ route('verification.notice') }}" wire:navigate class="btn btn-primary">Resend verification email</a>
                </div>
            </div>
        </div>
    @endif
</div>
