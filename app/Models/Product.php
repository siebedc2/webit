<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'id', 'name', 'slug', 'description', 'pictures', 'min_bid', 'status'
    ];

    public function bids() {
        return $this->hasMany('App\Models\Bid');
    }
}
