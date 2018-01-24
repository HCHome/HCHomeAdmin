<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends AuthedController
{
    public function delete($user_id){
        User::destroy($user_id);
        return redirect('/home');
    }
}
