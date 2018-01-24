<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends AuthedController
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')->get();
        $feedback = DB::table('feedback')->get();
        $user_applies = DB::table('user_applies')->get();
        return view('home',compact('users','feedback','user_applies'));
    }
}
