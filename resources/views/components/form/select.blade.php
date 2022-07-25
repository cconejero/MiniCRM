@props(['name', 'description', 'type'])

<div class="col-span-6 sm:col-span-3">
    <label for="{{ $name }}" class="block text-sm font-medium text-gray-700">{{ $description }}</label>
    <select id="{{ $name }}" name="{{ $name }}" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        {{ $slot }}
    </select>
</div>
