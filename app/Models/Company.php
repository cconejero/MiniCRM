<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = ['products'];

    /**
     * @return string
     */
    public function path()
    {
        return "/companies/{$this->id}";
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
