<?php

namespace App\Http\Controllers;

use App\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends AuthedController
{
    public function index(){
        $posts = DB::table('posts')->leftJoin('users','posts.user_id','=','users.user_id')->get();
        return view('post_admin',compact('posts'));
    }

    public function up($post){
        DB::table('posts')
            ->where('post_id',$post )
            ->update(['is_top' => 1]);
        return redirect('/post_admin');

    }

    public function down($post){
        DB::table('posts')
            ->where('post_id',$post )
            ->update(['is_top' => 0]);
        return redirect('/post_admin');
    }

    public function delete($post){
        Post::destroy($post);
        return redirect('/post_admin');
    }
}
