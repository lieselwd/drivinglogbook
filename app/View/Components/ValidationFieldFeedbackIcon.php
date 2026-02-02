<?php

namespace App\View\Components;

use App\Enums\PasswordValidatorRules;
use Illuminate\Contracts\View\View;
use Illuminate\Support\MessageBag;
use Illuminate\View\Component;

class ValidationFieldFeedbackIcon extends Component
{
    public function __construct(
        public bool $fieldEmpty,
        // Ensure that all rule keys are unique throughout the application
        public PasswordValidatorRules $ruleKey, //TODO: change if new enums made
        public array $errors
    ) {}

    public function render(): View
    {
        return view('components.validation-field-feedback-icon');
    }
}
