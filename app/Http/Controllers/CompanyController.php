<?php

namespace App\Http\Controllers;

use App\Models\Company;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all()->sortByDesc('created_at');

        return view('companies.index', compact('companies'));
    }

    public function create()
    {
        return view('companies.create');
    }

    public function store()
    {
        $attributes = $this->validateCompany();

        if ($attributes['logo'] ?? false) {
            $attributes['logo'] = 'storage/' . request()->file('logo')->store('logos');
        }

        $company = Company::create($attributes);

        return redirect($company->path());
    }

    public function show(Company $company)
    {
        return view('companies.show', compact('company'));
    }

    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    public function update(Company $company)
    {
        $attributes = $this->validateCompany();

        if ($attributes['logo'] ?? false) {
            $attributes['logo'] = 'storage/' . request()->file('logo')->store('logos');
        }

        $company->update($attributes);

        return redirect($company->path());
    }

    public function destroy(Company $company)
    {
        $company->delete();

        return redirect('/companies');
    }

    // A helper function for not repeating code
    protected function validateCompany()
    {
        return request()->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|min:3|max:255',
            'logo' => 'image',
            'website' => 'required|min:3|max:255',
            'description' => 'required',
        ]);
    }
}
