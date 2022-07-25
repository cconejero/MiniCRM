<?php

namespace App\Http\Controllers;

use App\Models\Purchase;

class PurchaseController extends Controller
{
    public function store()
    {
        $purchase = Purchase::create($this->validatePurchase());

        return redirect($purchase->client->path());
    }

    protected function validatePurchase()
    {
        return request()->validate([
            'product_id' => 'required',
            'client_id' => 'required',
        ]);
    }
}
