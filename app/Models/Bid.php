<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    protected $table = 'bids';

    protected $fillable = [
        'id', 'user_id', 'product_id', 'price', 'status'
    ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function product() {
        return $this->belongsTo('App\Models\Product');
    }
}
