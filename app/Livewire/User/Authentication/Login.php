<?php

namespace App\Livewire\User\Authentication;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Login extends Component
{
    #[Layout('components.layouts.default')]
    public function render()
    {
        return view('livewire.user.auth.login');
    }

    public function signInWithGoogle()
    {
        $this->redirectRoute('user.auth.redirect.google');
    }
}
