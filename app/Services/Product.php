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

    public function getAll() {
        return ProductModel::all();
    }

    public function getBySlug($slug) {
        return ProductModel::where('slug', $slug)->first();
    }

}