<div class="bg-white shadow overflow-hidden sm:rounded-lg">
    <div class="px-4 py-5 sm:px-6 flex items-center justify-between">
        <div class="flex items-center">
            @if($attributes['src'] !== null)
                <div class="shrink-0">
                    <img src="{{ $attributes['src'] }}" alt="{{ $attributes['alt'] }}" class="rounded-full w-8">
                </div>
            @endif
            <h3 class="text-lg leading-6 font-medium pl-3 text-gray-900">{{ $attributes['title'] }}</h3>
        </div>
        <div>
            @if($attributes['delete_action'] !== null)
                <form method="POST" action="{{ $attributes['delete_action'] }}" class="text-right">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-xs text-red-500">Delete</button>
                </form>
            @endif
        </div>
    </div>

    <div class="border-t border-gray-200">
        <dl>
            {{ $slot }}
        </dl>
    </div>
</div>
