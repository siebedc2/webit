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

    public function create($data) {
        return BidModel::create($data->input());
    }

    public function getHeighest($product_id) {
        return BidModel::where('product_id', $product_id)->orderBy('price', 'desc')->first();
    }

    /*public function getAllById($product_id) {
        return BidModel::where('product_id', $product_id)->orderBy('id', 'desc')->get();
    }*/
}