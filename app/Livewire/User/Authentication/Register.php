<?php

namespace App\Livewire\User\Authentication;

use App\Enums\PasswordValidatorRules;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Register extends Component
{
    public string $name = "Rusty";
    public string $email_address = "rusty@dave.com";

    #[Validate]
    public string $password = "Testing123$";

    public string $password_confirmation = "Testing123$";

    public string $validationFeedbackClass = 'mr-1 inline size-5';

    protected function rules()
    {
        return [
            'name' => 'required|string|min:1|max:70',
            'email_address' => 'required|string|email|max:255|unique:users,email',
            'password' => [
                'required', 'required', Password::min(8)->letters()->mixedCase()->numbers()->symbols(), //TODO: add back uncompromised
            ],
            'password_confirmation' => 'required|same:password'
        ];
    }

    protected function messages()
    {
        return [
            'password.min' => PasswordValidatorRules::MIN->value,
            'password.mixed' => PasswordValidatorRules::MIXED->value,
            'password.numbers' => PasswordValidatorRules::NUMBERS->value,
            'password.symbols' => PasswordValidatorRules::SYMBOLS->value,
            'password.letters' => PasswordValidatorRules::LETTERS->value,
            'password.uncompromised' => PasswordValidatorRules::UNCOMP->value,
        ];
    }

//    public function boot()
//    {
//        $this->withValidator(function ($validator) {
//           $validator->after(function ($validator) {
//               dump($validator->getMessageBag());
//           });
//        });
//    }

    #[Layout('components.layouts.default')]
    public function render()
    {
        return view('livewire.user.auth.register');
    }

    public function register()
    {
        $validated = $this->validate();

        $newUser = User::create([
            'name' => $validated['name'],
            'email' => $validated['email_address'],
            'password' => bcrypt($validated['password'])
        ]);

        event(new Registered($newUser));

        Auth::login($newUser);

        return redirect()->route('verification.notice');
    }
}
