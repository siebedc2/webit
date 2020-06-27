<?php

namespace App\Services;

use App\Models\User as UserModel;
use Validator;
use Auth;
use Mail;

class User {
    public function validator(array $data) {
        return Validator::make($data, [
            'name' => 'required',
            'email' => 'required'
        ]);
    }

    public function changePassword($new_password, $user_id) {
        $user = UserModel::find($user_id);
        $user->password = bcrypt($new_password);
        $user->save();
    }

    public function sendConfirmation($email) {
        Mail::send('emails.confirmation', ['email' => $email], function ($m) use ($email) {
            $m->from(config('mail.from.address'), config('mail.from.name'));
            $m->replyTo($email);
            $m->to($email)->subject('Bid placed');
        });
    }
}