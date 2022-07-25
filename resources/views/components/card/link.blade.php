@props(['href', 'target'])

<div class="mt-4 px-6 flex-1">
    <a href="{{ $href }}" class="mt-2 block text-gray-400 text-xs" target="{{ $target }}">{{ $slot }}</a>
</div>

