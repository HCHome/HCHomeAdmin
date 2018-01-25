<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends AuthedController
{
    public function index(){
        $posts = DB::table('posts')->get();
        return view('post_admin',compact('posts'));
    }
}
