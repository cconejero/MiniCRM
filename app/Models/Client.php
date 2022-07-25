<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = ['purchases'];

    /**
     * @param $query
     * @param  array  $filters
     * @return void
     */
    public function scopeFilter($query, array $filters): void
    {
        $query->when($filters['search'] ?? false, fn ($query, $search) => $query->where(fn ($query) => $query
            ->where('name', 'like', '%'.$search.'%')
            ->orWhere('surname', 'like', '%'.$search.'%')
            ->orWhere('email', 'like', '%'.$search.'%')
            ->orWhere('phone', 'like', '%'.$search.'%')
        )
        );
    }

    public function path()
    {
        return "/clients/{$this->id}";
    }

    public function purchases()
    {
        return $this->belongsToMany(Product::class, 'purchases')->withTimestamps();
    }
}
