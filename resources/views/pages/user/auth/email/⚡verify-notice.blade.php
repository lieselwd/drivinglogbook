<?php

use App\Enums\NavAlertType;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

new #[Layout('components.layouts.default')]
class extends Component {
    public bool $emailSent = false;

    public function mount()
    {
        if (Auth::user()->hasVerifiedEmail()) {
            redirect()->route('dashboard')->with(\App\createSessionFlashInfo(
                message: 'Your email address is already validated.',
                type: NavAlertType::Warning
            ));
        }
    }

    public function resendEmail()
    {
        Auth::user()->sendEmailVerificationNotification();
        $this->emailSent = true;
    }
};
?>

<div>
    <x-slot:pageTitle>Verify email address</x-slot:pageTitle>
    <div class="min-h-screen flex items-center justify-center bg-base-300">
        <div class="bg-base-100 p-8 rounded-lg shadow-xl max-w-md w-full">
            <h1 class="text-3xl font-semibold">Please verify your email address</h1>
            <div class="prose">
                <p>
                    We have sent an email to <span class="font-mono">{{ auth()->user()->email }}</span> with a
                    verification link. This is to ensure that you own the email address.
                </p>
                <h4 class="mt-3">Haven't received it?</h4>
                <p>
                    Please check your spam/junk folder. Otherwise, you can re-send the email.
                </p>
            </div>
            <div>
                <button wire:click="resendEmail()" class="btn mt-3">Send another email</button>
                <div wire:show="emailSent">
                    <div class="mt-2 alert alert-success">
                        Email sent!
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
