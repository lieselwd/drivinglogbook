@props(['type' => 'other', 'message'])

<div x-data="{ open: true }">
<div role="alert" {{ $attributes->merge(['class' => 'alert alert-'.$type]) }} x-show="open">
    @switch($type)
        @case('success')
            {!! \App\Enums\NavAlertType::Success->icon() !!}
        @case('error')
            {!! \App\Enums\NavAlertType::Error->icon() !!}
        @case('warning')
            {!! \App\Enums\NavAlertType::Warning->icon() !!}
        @case('info')
            {!! \App\Enums\NavAlertType::Info->icon() !!}
        @default()
            {!! \App\Enums\NavAlertType::Other->icon() !!}
    @endswitch
    <div>
        <span>{{ $message }}</span>
    </div>
    <button @click="open = false" class="btn btn-sm">Close</button>
</div>
</div>
