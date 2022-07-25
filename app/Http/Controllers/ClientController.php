<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Company;

class ClientController extends Controller
{
    public function index()
    {
        // We dont use purchases in the index page so...
        $clients = Client::without('purchases')
            ->latest()
            ->filter(
                request(['search'])
            )->paginate(20)
            ->withQueryString();

        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Client $client)
    {
        $company = Client::create($this->validateClient());

        return redirect($client->path());
    }

    public function show(Client $client)
    {
        $companies = Company::all();

        return view('clients.show', compact('client', 'companies'));
    }

    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    public function update(Client $client)
    {
        $attributes = $this->validateClient();

        $client->update($attributes);

        return redirect($client->path());
    }

    public function destroy(Client $client)
    {
        $client->delete();

        return redirect('/clients');
    }

    // a helper function to no repeat code.
    protected function validateClient()
    {
        return request()->validate([
            'name' => 'required|min:3|max:255',
            'surname' => 'required|min:3|max:255',
            'email' => 'required|email',
            'phone' => 'required|min:8',
        ]);
    }
}
