<x-app-layout>
    <header class="flex items-center mb-3 py-4">
        <div class="flex justify-between items-end w-full">
            <h2 class="text-gray-400 text-sm font-normal"></h2>
            <a href="{{ $client->path() }}/edit" class="button">Edit Client</a>
        </div>
    </header>

    <!--
     Client Description
     -->

    <div class="-mx-3">
        <x-description.description alt="{{ $client->name }} Logo"
                                   :delete_action="$client->path()"
                                   title="{{ $client->surname }}, {{ $client->name }}">

            <x-description.row class="bg-gray-50">
                <x-slot:title>Full Name</x-slot:title>
                {{ $client->surname . ', ' . $client->name }}
            </x-description.row>

            <x-description.row class="bg-white">
                <x-slot:title>Email</x-slot:title>
                {{ $client->email }}
            </x-description.row>

            <x-description.row class="bg-gray-50">
                <x-slot:title>Phone</x-slot:title>
                {{ $client->phone }}
            </x-description.row>

            <x-description.row class="bg-white">
                <x-slot:title>Updated</x-slot:title>
                {{ $client->updated_at->diffForHumans() }}
            </x-description.row>

            <x-description.row class="bg-gray-50">
                <x-slot:title>Created</x-slot:title>
                {{ $client->created_at->diffForHumans() }}
            </x-description.row>
        </x-description.description>
    </div>

    <!--
     Client Purchases
     -->

    <div class="-mx-3 mt-8">
        <x-description.description alt="Logo"
                                   title="Client Purchases">
            @foreach($client?->purchases as $purchase)
                <x-description.row class="odd:bg-gray-50 even:bg-white">
                    <x-slot:title>{{ $purchase->name }}</x-slot:title>
                    <div class="flex justify-between">
                        <div>{{ $purchase->value }}</div>
                        <div>{{ $purchase->pivot->created_at->diffForHumans() }}</div>
                    </div>
                </x-description.row>
            @endforeach

        </x-description.description>
    </div>

    <!--
     Client New Purchases
     -->

    <div class="-mx-3 mt-6">
        <x-description.description title="New Purchase">
            <form action="{{ '/purchases' }}" method="POST">
                @csrf
                <input type="hidden" name="client_id" value="{{ $client->id }}">
                <x-description.row class="bg-gray-50 flex items-center">
                    <x-slot:title>
                        <select class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                id="product_id"
                                name="product_id">
                            @foreach($companies as $company)
                                @foreach($company->products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            @endforeach
                        </select>
                    </x-slot:title>
                    <button class="button">Buy</button>
                </x-description.row>
            </form>
        </x-description.description>
    </div>
</x-app-layout>
