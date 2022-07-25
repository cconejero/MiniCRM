@props(['name', 'description', 'type'])

<div class="col-span-6 sm:col-span-3">
    <label for="first-name" class="block text-sm font-medium text-gray-700">{{ $description }}</label>
    <input
        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
        id="{{ $name }}"
        name="{{ $name }}"
        type="{{ $type }}"
        {{ $attributes(['value' => old($name)]) }}>
    <x-form.error name="{{ $name }}"/>
</div>
