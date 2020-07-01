<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\USer as UserService;
use Auth;

class UserController extends Controller
{
    protected $_request;

    function __construct(Request $request) {
        $this->_request = $request;
    }

    public function changePassword() {
        return view('user.changePassword');
    }

    public function handleChangePassword(UserService $user) {
        if(!password_verify($this->_request->input('newPassword'), Auth::user()->password)) {
            if($this->_request->input('newPassword') == $this->_request->input('repeatNewPassword')) {
                $user->changePassword($this->_request->input('newPassword'), Auth::user()->id);
                return redirect('/userdashboard/changePassword')->with('status', 'Password changed!');
            }
    
            else {
                $errors = [ 
                    "message"   => "Oops! Your new passwords do not match.",
                ];
                return redirect('/userdashboard/changePassword')->withInput($this->_request->input())->with('errors', $errors);
            }
        }

        else {
            $errors = [ 
                "message"   => "Oops! You already used this password.",
            ];
            return redirect('/userdashboard/changePassword')->withInput($this->_request->input())->with('errors', $errors);
        }

        
    }
}
