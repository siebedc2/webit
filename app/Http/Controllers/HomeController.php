<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\Product as ProductService;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        return view('home');
    }

    public function userIndex() {
        return view('user.index');
    }

    public function adminIndex(ProductService $product) {
        $data['products'] = $product->getAll();
        return view('admin.index', $data);
    }

    public function success() {
        return view('success.success');
    }
}
