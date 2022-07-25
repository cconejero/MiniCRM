@props(['href'])

<div class="mt-4 px-6 flex-1">
    <h1 class="text-3xl">
        <a href="{{ $href }}">
            {{ Str::limit($slot, 35, $end="...") }}
        </a>
    </h1>
</div>
