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
        $data['bids'] = $bid->getByProductId($data['product']['id']);
        return view('products.details', $data);
    }

    public function personalBids(BidService $bid) {
        $data['bids'] = $bid->getByUserId(Auth::id());
        return view('user.index', $data);
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
        $data = $product->mapData($this->_request->all());
        if ($product->validator($data)->fails()) {
            $errors = $product->validator($this->_request->all())->errors();
            return back()->with('errors', $errors);
        } 
        
        else {
            if($slug == null) {
                if($product->create($this->_request->all())) {
                    return redirect('/admindashboard');
                }
            }

            else {
                if($product->update($this->_request->all(), $slug)) {
                    return redirect('/admindashboard');
                }
            }
        } 
    }

    public function handleDelete(ProductService $product) {
        if($product->delete($this->_request->input('product_id'))) {
            return response()->json([
                'message'       => 'success',
            ]);
            
            //return redirect('/admindashboard')->with('status', 'Product deleted!');
        }
    }
}
