<x-app-layout>
    <header class="flex items-center mb-3 py-4">
        <div class="flex justify-between items-end w-full">
            <h2 class="text-gray-400 text-sm font-normal">Companies</h2>
            <a href="/companies/create" class="button">New Company</a>
        </div>
    </header>

    <div class="-mx-3">
        @forelse($companies as $company)
            <div class="w-full px-3 pb-6">
                <x-card.card>
                    <x-card.image src="{{ asset($company->logo) }}" alt="{{ $company->name }} Logo" />
                    <x-card.title :href="$company->path()">
                        {{ $company->name }}
                    </x-card.title>
                    <x-card.link href="mailto:{{ $company->email }}" target="">
                        {{ $company->email }}
                    </x-card.link>
                    <x-card.link href="https://{{ $company->website }}" target="_blank">
                        {{ $company->website }}
                    </x-card.link>
                    <form method="POST" action="{{ $company->path() }}" class="text-right">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-xs text-red-500">Delete</button>
                    </form>
                </x-card.card>
            </div>
        @empty
            <div>No companies yet.</div>
        @endforelse
    </div>
</x-app-layout>
