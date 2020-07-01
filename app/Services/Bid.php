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

    public function getAll() {
        return BidModel::where('status', 'online')->orderBy('created_at', 'desc')->get();
    }

    public function getByUserId($user_id) {
        return BidModel::where([
            ['user_id', $user_id],
            ['status', 'online']
        ])->orderBy('id', 'desc')->get();
    }

    public function create($data) {
        return BidModel::create($data->input());
    }

    public function getHeighest($product_id) {
        return BidModel::where([
            ['product_id', $product_id],
            ['status', 'online']
        ])->orderBy('price', 'desc')->first();
    }

    public function getByProductId($product_id) {
        return BidModel::where([
            ['product_id', $product_id],
            ['status', 'online']
        ])->orderBy('id', 'desc')->get();
    }

    public function cancel($bid_id) {
        $bid = BidModel::find($bid_id);
        $bid->status = 'offline';
        return $bid->save();
    }
}