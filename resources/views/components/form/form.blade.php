@props(['title', 'description', 'cancel_url', 'action', 'method', 'update'])

<div class="mt-6">
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900">{{ $title }}</h3>
                <p class="mt-1 text-sm text-gray-600">{{ $description }}</p>
            </div>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
            <form action="{{ $action }}" method="{{ $method }}" enctype="multipart/form-data">
                @csrf
                @if($update)
                    @method('PATCH')
                @endif
                <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                        {{ $slot }}
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <a href="{{ $cancel_url }}" class="cancel">Cancel</a>
                        <button type="submit"
                                class="button">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
