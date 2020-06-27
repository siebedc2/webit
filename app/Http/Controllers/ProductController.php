<?php

namespace App\Http\Controllers;

use App\Services\Product as ProductService;
use App\Services\Bid as BidService;

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

    public function handleBid(BidService $bid) {
        if ($bid->validator($this->_request->input())->fails()) {
            $errors = $bid->validator($this->_request->input())->errors();
            return back()->with('errors', $errors);
        } 
        
        else {
            if($bid->create($this->_request)) {
                return redirect('success');
            }
        }
        
    }
}
