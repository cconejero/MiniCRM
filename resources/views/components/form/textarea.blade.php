@props(['name', 'description'])

<div>
    <label for="about" class="block text-sm font-medium text-gray-700">{{ $description }}</label>
    <div class="mt-1">
        <textarea class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"
                  id="{{ $name }}"
                  name="{{ $name }}"
                  placeholder="A brief description of the company"
                  rows="8">{{ $slot ?? old($name) }}</textarea>
    </div>
    <x-form.error name="{{ $name }}" />
</div>
