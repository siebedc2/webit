<?php

use Illuminate\Database\Seeder;
use App\Models\Product as ProductModel;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new ProductModel();
        $product->name = "Typewriter 1980";
        $product->slug = "typewriter";
        $product->description = "Lorem Ipsum is simply dummy text of the printing a...";
        $product->pictures = "product1.jpg";
        $product->min_bid = "25";
        $product->save();
    }
}
