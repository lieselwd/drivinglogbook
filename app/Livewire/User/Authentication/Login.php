<?php

namespace App\Livewire\User\Authentication;

use App\Enums\NavAlertType;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;
use function App\createSessionFlashInfo;

class Login extends Component
{
    public string $email = "rusty@dave.com";
    public string $password = "Testing123$";
    public bool $rememberMe = false;

    #[Layout('components.layouts.default')]
    public function render()
    {
        return view('livewire.user.auth.login');
    }

    public function authenticate()
    {
        $credentials = $this->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $this->rememberMe)) {
            request()->session()->regenerate();
            $name = Auth::user()->name;
            return redirect()
                ->intended(route('dashboard'))
                ->with(createSessionFlashInfo(
                    message: "Welcome back, {$name}!",
                    type: NavAlertType::Success
                ));
        }

        $this->addError('email', 'We could not find a user with those credentials.');
    }

    public function signInWithGoogle()
    {
        $this->redirectRoute('user.auth.redirect.google');
    }
}
