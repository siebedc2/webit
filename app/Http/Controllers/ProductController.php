<?php

namespace App\Http\Controllers;

use App\Services\User as UserService;
use App\Services\Product as ProductService;
use App\Services\Bid as BidService;
use Auth;

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

    public function details(ProductService $product, BidService $bid, $slug) {
        $data['product'] = $product->getBySlug($slug);
        $data['highest_bid'] = $bid->getHeighest($data['product']['id']);
        return view('products.details', $data);
    }

    public function handleBid(BidService $bid, UserService $user) {
        if ($bid->validator($this->_request->input())->fails()) {
            $errors = $bid->validator($this->_request->input())->errors();
            return back()->with('errors', $errors);
        } 
        
        else {
            if($bid->create($this->_request)) {
                $user->sendConfirmation(Auth::user()->email);
                return redirect('success'); 
            }
        } 
    }

    public function change(ProductService $product, $slug = null) {
        if($slug != null) {
            $data['product'] = $product->getBySlug($slug);
            return view('admin.change', $data);
        }
            
        else {
            return view('admin.change');
        }
    }

    public function handleChange(ProductService $product, $slug = null) {
        if ($product->validator($this->_request->all())->fails()) {
            $errors = $product->validator($this->_request->all())->errors();
            return back()->with('errors', $errors);
        } 
        
        else {
            if($slug == null) {
                $product->create($this->_request->all());
            }

            else {
                $product->update($this->_request->all());
            }
        } 
    }

    public function handleDelete(ProductService $product, $product_id) {
        if($product->delete($product_id)) {
            return redirect('/admindashboard')->with('status', 'Product deleted!');
        }
    }
}
