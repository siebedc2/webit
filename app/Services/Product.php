<?php

namespace App\Services;

use App\Models\Product as ProductModel;
use Validator;

class Product {
    public function validator(array $data) {
        return Validator::make($data, [
            'slug'          => 'required',
            'description'   => 'required',
            'pictures'      => 'nullable|mimes:mimes:jpeg,png,jpg|max:2000'
        ]);
    }

}