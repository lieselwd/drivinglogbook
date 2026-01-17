<?php

namespace App;

use App\Enums\NavAlertType;

if (! function_exists('createSessionFlashInfo')) {
    /**
     * @param $message
     * @param NavAlertType $type
     * @return array
     *
     * Creates array for use in flashing temporary messages
     */
    function createSessionFlashInfo($message, NavAlertType $type = NavAlertType::Other): array {
        return [
            'nav-alert-type' => $type->value,
            'nav-alert-message' => $message
        ];
    }
}
