@props(['name', 'description'])

<div>
    <label class="block text-sm font-medium text-gray-700">{{ $description }}</label>
    <div class="mt-1 flex items-center">
        <span class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100">
            <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                <path
                    d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z"/>
            </svg>
        </span>
        <div class="flex text-sm text-gray-600 px-6">
            <input id="{{ $name }}" name="{{ $name }}" type="file" {{ $attributes(['value' => old($name)]) }} />
        </div>
    </div>
    <x-form.error name="{{ $name }}" />
</div>
