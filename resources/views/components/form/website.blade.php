@props(['name', 'description'])

<div class="grid grid-cols-3 gap-6">
    <div class="col-span-3 sm:col-span-2">
        <label for="company-website" class="block text-sm font-medium text-gray-700">{{ $description }}</label>
        <div class="mt-1 flex rounded-md shadow-sm">
            <span
                class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm"> https:// </span>
            <input
                class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                id="{{ $name }}"
                name="{{ $name }}"
                placeholder="www.example.com"
                {{ $attributes(['value' => old($name)]) }}
                type="text">
        </div>
        <x-form.error name="{{ $name }}"/>
    </div>
</div>
