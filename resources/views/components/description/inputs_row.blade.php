@props(['class'])

<div class="{{ $class }} px-4 py-5 flex sm:gap-4 sm:px-6">
    <input
        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
        id="{{ $attributes['name1'] }}"
        name="{{ $attributes['name1'] }}"
        type="{{ $attributes['type1'] }}"
        value="{{ $attributes['value1'] }}"
        placeholder="{{ $attributes['placeholder1'] }}"
        {{ $attributes(['value' => old($attributes['name1'])]) }}>
    <x-form.error name="{{ $attributes['name1'] }}" />

    <div class="flex inline-flex items-center">
    <span
        class="px-3 text-gray-500 text-sm"> U$D </span>
    <input
        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 shadow-sm sm:text-sm border-gray-300 rounded-md"
        id="{{ $attributes['name2'] }}"
        name="{{ $attributes['name2'] }}"
        type="{{ $attributes['type2'] }}"
        value="{{ $attributes['value2'] }}"
        placeholder="{{ $attributes['placeholder2'] }}"
        {{ $attributes(['value' => old($attributes['name2'])]) }}>
    <x-form.error name="{{ $attributes['name2'] }}" />
    </div>

    {{ $slot }}
</div>
