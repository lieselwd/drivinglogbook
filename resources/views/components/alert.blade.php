@props(['type' => 'other', 'message'])

<div x-data="{ open: true }">
<div role="alert" {{ $attributes->merge(['class' => 'alert alert-'.$type]) }} x-show="open">
    @switch($type)
        @case('success')
            {!! \App\Enums\NavAlertType::Success->icon() !!}
            @break
        @case('error')
            {!! \App\Enums\NavAlertType::Error->icon() !!}
            @break
        @case('warning')
            {!! \App\Enums\NavAlertType::Warning->icon() !!}
            @break
        @case('info')
            {!! \App\Enums\NavAlertType::Info->icon() !!}
            @break
        @default
            {!! \App\Enums\NavAlertType::Other->icon() !!}
    @endswitch
    <span>{{ $message }}</span>
    <div>
        <button @click="open = false" class="btn btn-sm">Close</button>
    </div>
</div>
</div>
