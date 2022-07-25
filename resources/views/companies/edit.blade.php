<x-app-layout>
    <div class="-mx-3">
        <x-form.form action="{{ $company->path() }}"
                     cancel_url="{{ $company->path() }}"
                     description="This information will be displayed publicly so be careful what you share."
                     method="POST"
                     :update="true"
                     title="Edit {{ $company->name }}">

            <x-form.input name="name" description="Name" type="text" :value="old('name', $company->name)" />

            <x-form.input name="email" description="Email" type="email" :value="old('email', $company->email)" />

            <x-form.image name="logo" description="Logo" :value="old('logo', $company->logo)" />

            <x-form.website name="website" description="Website" :value="old('website', $company->website)" />

            <x-form.textarea name="description" description="About">{{ old('description', $company->description) }}</x-form.textarea>

        </x-form.form>
    </div>
</x-app-layout>
