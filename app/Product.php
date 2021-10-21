<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'price',
        'amount',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
