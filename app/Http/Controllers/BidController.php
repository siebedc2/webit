<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\User as UserService;
use App\Services\Bid as BidService;
use Auth;

class BidController extends Controller
{
    protected $_request;

    function __construct(Request $request) {
        $this->_request = $request;
    }

    public function personalBids(BidService $bid) {
        $data['bids'] = $bid->getByUserId(Auth::id());
        return view('user.index', $data);
    }

    public function cancelBid(BidService $bid, $bid_id) {
        if($bid->cancel($bid_id)) {
            return back()->with('status', 'Bid cancelled!');
        }
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
}
