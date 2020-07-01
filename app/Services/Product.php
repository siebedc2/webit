<?php

namespace App\Services;

use Illuminate\Validation\Rule;
use App\Models\Product as ProductModel;
use Validator;

class Product {
    public function validator(array $data) {
        return Validator::make($data, [
            'name'          => 'required',
            'slug'          => [
                'required',
                Rule::unique('products')->ignore($data['id'])           
                ],
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

    public function mapData($data) {
        $data['slug'] = str_replace(' ', '', $data['slug']);
        return $data;
    }

    public function saveImage($image) {
        $ext = $image->extension();
        $filename =  date('Y-m-d-H-i-s') . '_' . uniqid() . '.' . $ext;
        $image->move('images/uploads', $filename);
        return $filename;
    }

    public function create($data) {
        if(!empty($data['pictures'])) {
            $filename               = $this->saveImage($data['pictures']);
            $data['pictures']       = $filename;
        }
        
        return ProductModel::create($data);
    }

    public function update($data, $slug) {
        $product                = ProductModel::where('slug', $slug)->first();
        $product->name          = $data['name'];
        $product->slug          = $data['slug'];
        $product->description   = $data['description'];

        if(!empty($data['pictures'])) {
            $filename = $this->saveImage($data['pictures']);
            $data['pictures']   = $filename;
            $product->pictures  = $data['pictures'];
        }

        if(!empty($data['pictures'])) {
            $product->min_bid   = $data['min_bid'];
        }
        
        return $product->save();
    }

    public function delete($product_id) {
        // Soft delete
        $product = ProductModel::find($product_id);
        $product->status        = 'offline';
        return $product->save();

        // Hard delete
        // $product->delete();
    }

}