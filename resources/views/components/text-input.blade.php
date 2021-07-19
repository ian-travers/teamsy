@props([
'id' => "",
'type' => "text",
'label' => "",
'required' => false,
'placeholder' => "",
])

<div {{ $attributes(['class' => '']) }}>
    <label for="{{ $attributes->whereStartsWith('wire:model')->first() }}" class="block text-sm font-medium text-gray-700">{{ $label }}</label>
    <div class="mt-1 relative rounded-md shadow-sm">
        <input
            {{ $attributes->whereStartsWith('wire:model') }}
            type="{{ $type }}"
            id="{{ $attributes->whereStartsWith('wire:model')->first() }}"
            @error($attributes->whereStartsWith('wire:model')->first())
                class="block w-full pr-10 border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm rounded-md"
                aria-invalid="true"
                aria-describedby="email-error"
            @else
                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
            @enderror

            placeholder="{{ $placeholder }}"
            {{ $required ? 'required' : '' }}
        >
        @error($attributes->whereStartsWith('wire:model')->first())
            <div wire:key="error_svg_{{ $attributes->whereStartsWith('wire:model')->first() }}" class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd"
                          d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                          clip-rule="evenodd"/>
                </svg>
            </div>
        @enderror
    </div>
    @error($attributes->whereStartsWith('wire:model')->first())
        <p
            wire:key="error_{{ $attributes->whereStartsWith('wire:model')->first() }}"
            class="mt-1 text-xs text-red-600">
            {{ $message }}
        </p>
    @enderror
</div>
