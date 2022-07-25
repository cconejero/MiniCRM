<x-app-layout>
    <div class="-mx-3">
        <x-form.form action="/companies"
                     cancel_url="/companies"
                     description="This information will be displayed publicly so be careful what you share."
                     method="POST"
                     :update="false"
                     title="New Company">

            <x-form.input name="name" description="Name" type="text" />

            <x-form.input name="email" description="Email" type="email" />

            <x-form.image name="logo" description="Logo" />

            <x-form.website name="website" description="Website"/>

            <x-form.textarea name="description" description="About"/>

        </x-form.form>
    </div>
</x-app-layout>
