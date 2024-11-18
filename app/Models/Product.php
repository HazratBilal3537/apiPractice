<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Scope for searching by name
    public function scopeSearchByName($query, $name)
    {
        return $query->where('name', 'LIKE', '%' . strtolower($name) . '%');
    }

    // Accessor for the "name" attribute
    public function getNameAttribute($value)
    {
        return ucwords($value);  // Capitalize first letter of each word
    }

    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity',
        'category',
        'image',
        'is_active',
    ];
}
