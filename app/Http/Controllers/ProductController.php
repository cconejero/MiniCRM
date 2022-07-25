<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Product;

class ProductController extends Controller
{
    public function store()
    {
        $product = Product::create($this->validateProduct());

        return redirect($product->company->path());
    }

    public function update(Company $company, Product $product)
    {
        $product->update($this->validateProduct());

        return redirect($company->path());
    }

    protected function validateProduct()
    {
        return request()->validate([
            'company_id' => 'required|exists:companies,id',
            'name' => 'required|min:3|max:255',
            'value' => 'required',
        ]);
    }
}
