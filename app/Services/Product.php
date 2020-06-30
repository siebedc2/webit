<?php

namespace App\Services;

use App\Models\Product as ProductModel;
use Validator;

class Product {
    public function validator(array $data) {
        return Validator::make($data, [
            'name'          => 'required',
            'slug'          => 'required|unique:products,slug,' . $data['slug'].',slug',
            'description'   => 'required',
            'pictures'      => 'nullable|mimes:jpg,jpeg,png'
        ]);
    }

    public function getAll() {
        return ProductModel::all();
    }

    public function getById($product_id) {
        return ProductModel::find($product_id);
    }

    public function getBySlug($slug) {
        return ProductModel::where('slug', $slug)->first();
    }

    public function create($data) {
        return ProductModel::create($data);
    }

    public function update($data, $slug) {
        $product = ProductModel::where('slug', $slug)->first();
        $product->name = $data['name'];
        $product->slug = $data['slug'];
        $product->description = $data['description'];

        if(!empty($data['pictures'])) {
            $product->pictures = $data['pictures'];
        }

        if(!empty($data['pictures'])) {
            $product->min_bid = $data['min_bid'];
        }
        
        return $product->save();
    }

    public function delete($product_id) {
        // Soft delete
        $product = ProductModel::find($product_id);
        $product->status = 'offline';
        return $product->save();

        // Hard delete
        // $product->delete();
    }

}