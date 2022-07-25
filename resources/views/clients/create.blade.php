<x-app-layout>
    <div class="-mx-3">
        <x-form.form action="/clients"
                     cancel_url="/clients"
                     description="This information will be displayed publicly so be careful what you share."
                     method="POST"
                     :update="false"
                     title="New Client">

            <x-form.input name="name" description="Name" type="text" />
            <x-form.input name="surname" description="Surname" type="text" />

            <x-form.input name="email" description="Email" type="email" />

            <x-form.input name="phone" description="Phone" type="text" />

        </x-form.form>
    </div>
</x-app-layout>
