<div>
    @if (! $fieldEmpty)
        @if (in_array($ruleKey->value, $errors))
            <x-cross-circle-fill {{ $attributes->merge(['class' => 'text-error']) }} />
        @else
            <x-check-circle-fill {{ $attributes->merge(['class' => 'text-success']) }} />
        @endif
    @else
        <x-check-circle-unfill {{ $attributes }} />
    @endif
</div>
