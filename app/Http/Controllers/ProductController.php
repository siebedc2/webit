<?php

namespace App\Http\Controllers;

use App\Services\Product as ProductService;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $_request;

    function __construct(Request $request) {
        $this->_request = $request;
    }

    public function index(ProductService $product) {
        $data['products'] = $product->getAll();
        return view('index', $data);
    }

    public function details(ProductService $product, $slug) {
        $data['product'] = $product->getBySlug($slug);
        return view('products.details', $data);
    }
}
