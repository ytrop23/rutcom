@props(['options' => []])

@php
    $options = array_merge([
                    'dateFormat' => 'H:i',
                    'enableTime' => true,
                    'noCalendar' =>  true,
                    'time_24hr' => true,
                    'defaultDate'=>"00:00"
                    ], $options);
@endphp

<div wire:ignore>
    <input
        x-data="{value: @entangle($attributes->wire('model')), instance: undefined}"
        x-init="() => {
                $watch('value', value => instance.setDate(value, true));
                instance = flatpickr($refs.input, {{ json_encode((object)$options) }});
            }"
        x-ref="input"
        x-bind:value="value"
        type="text"
        {{ $attributes->merge(['class' => 'form-input w-full rounded-md shadow-sm']) }}
    />
</div>
