<x-app-layout>
    <header class="flex items-center mb-3 py-4">
        <div class="flex justify-between items-end w-full">
            <h2 class="text-gray-400 text-sm font-normal"></h2>
            <a href="{{ $company->path() }}/edit" class="button">Edit Company</a>
        </div>
    </header>

    <!--
     Company Description
     -->

    <div class="-mx-3">
        <x-description.description alt="{{ $company->name }} Logo"
                                   :delete_action="$company->path()"
                                   src="{{ asset($company->logo) }}"
                                   title="{{ $company->name }}">

            <x-description.row class="bg-gray-50">
                <x-slot:title>Email</x-slot:title>
                {{ $company->email }}
            </x-description.row>

            <x-description.row class="bg-white">
                <x-slot:title>Website</x-slot:title>
                {{ $company->website }}
            </x-description.row>

            <x-description.row class="bg-gray-50">
                <x-slot:title>Description</x-slot:title>
                {{ $company->description }}
            </x-description.row>

            <x-description.row class="bg-white">
                <x-slot:title>Updated</x-slot:title>
                {{ $company->updated_at->diffForHumans() }}
            </x-description.row>

            <x-description.row class="bg-gray-50">
                <x-slot:title>Created</x-slot:title>
                {{ $company->created_at->diffForHumans() }}
            </x-description.row>
        </x-description.description>
    </div>

    <!--
     Company Products
     -->

    <div class="-mx-3 mt-6">
        <x-description.description title="Products">
            @foreach($company?->products as $product)
                <form action="{{ $company->path() }}/products/{{ $product->id }}" method="POST">
                    @method('PATCH')
                    @csrf
                    <input type="hidden" name="company_id" value="{{ $company->id }}">
                    <x-description.inputs_row class="bg-gray-50"
                                              name1="name"
                                              name2="value"
                                              placeholder1="New Product Name"
                                              placeholder2="Value"
                                              value1="{{ $product->name }}"
                                              value2="{{ $product->value }}"
                                              type1="text"
                                              type2="text">
                        <button class="button">Update</button>
                    </x-description.inputs_row>
                </form>
            @endforeach

            <!--
                New Product
            -->

            <form action="{{ $company->path() . '/products' }}" method="POST">
                @csrf
                <input type="hidden" name="company_id" value="{{ $company->id }}">
                <x-description.inputs_row class="bg-gray-50"
                                          name1="name"
                                          name2="value"
                                          placeholder1="Product Name"
                                          placeholder2="Value"
                                          type1="text"
                                          type2="text">
                    <button class="button">Create</button>
                </x-description.inputs_row>
            </form>
        </x-description.description>
    </div>
</x-app-layout>
