<x-app-layout>
    <header class="flex items-center mb-3 py-4">
        <div class="flex justify-between items-end w-full">
            <h2 class="text-gray-400 text-sm font-normal">Clients</h2>
            <a href="/clients/create" class="button">New Client</a>
        </div>
        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
            <form method="GET" action="/clients">
                <input type="text"
                       name="search"
                       placeholder="Find Client"
                       class="bg-white placeholder-black font-semibold text-sm rounded-lg"
                       value="{{ request('search') }}">
            </form>
        </div>
    </header>

    <div class="-mx-3">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6 flex items-center">
                <table class="table-auto w-full sm:text-left">
                    <tr>
                        <th>Surname</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>View</th>
                    </tr>
                    @foreach($clients as $client)
                        <tr class="even:bg-gray-50 odd:bg-white">
                            <td>{{ $client->surname }}</td>
                            <td>{{ $client->name }}</td>
                            <td>{{ $client->email }}</td>
                            <td>{{ $client->phone }}</td>
                            <td><a href="/clients/{{ $client->id }}">View</a></td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="px-4 py-5 sm:px-6">
                {{ $clients->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
