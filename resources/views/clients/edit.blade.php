<x-app-layout>
    <div class="-mx-3">
        <x-form.form action="{{ $client->path() }}"
                     cancel_url="{{ $client->path() }}"
                     description="This information will be displayed publicly so be careful what you share."
                     method="POST"
                     :update="true"
                     title="Edit {{ $client->surname }}, {{ $client->name }}">

            <x-form.input name="name" description="Name" type="text" :value="old('name', $client->name)" />
            <x-form.input name="surname" description="Surname" type="text" :value="old('surname', $client->surname)" />

            <x-form.input name="email" description="Email" type="email" :value="old('email', $client->email)" />

            <x-form.input name="phone" description="Phone" type="text" :value="old('phone', $client->phone)" />

        </x-form.form>
    </div>
</x-app-layout>
