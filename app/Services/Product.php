<?php

namespace App\Services;

use App\Models\Product as ProductModel;
use Validator;

class Product {
    public function validator(array $data) {
        return Validator::make($data, [
            'name'          => 'required',
            'slug'          => 'required|unique:products,' . $data['slug'],
            'description'   => 'required',
            'pictures'      => 'required|mimes:jpg,jpeg,png'
        ]);
    }

    public function getAll() {
        return ProductModel::all();
    }

    public function getBySlug($slug) {
        return ProductModel::where('slug', $slug)->first();
    }

    public function create($data) {
        return ProductModel::create($data);
    }

    public function update($data) {
        dd('Edit product');
    }

    public function delete($product_id) {
        $product = ProductModel::find($product_id);
        $product->status = 'offline';
        return $product->save();
    }

}