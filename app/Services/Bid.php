<?php

namespace App\Services;

use App\Models\Bid as BidModel;
use Validator;

class Bid {
    public function validator(array $data) {
        return Validator::make($data, [
            'user_id'       => 'required',
            'product_id'    => 'required',
            'price'         => 'required'
        ]);
    }

}