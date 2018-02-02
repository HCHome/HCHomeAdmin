<?php

namespace App\Http\Controllers;

use App\post;
use App\post_reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends AuthedController
{
    public function index(){
        $posts = DB::table('posts')->leftJoin('users','posts.user_id','=','users.user_id')->get();
        return view('post_admin',compact('posts'));
    }

    public function index_certain($id){
        $post = DB::table('posts')->where('post_id',$id)->leftJoin('users','posts.user_id','=','users.user_id')->get()[0];
        $post_pictures = DB::table('post_pictures')->where('post_id',$id)->get();
        $replies = DB::table('post_replies')->where('post_id',$id)->leftJoin('users','post_replies.replier_id','=','users.user_id')->get();
        return view('post',compact('post','post_pictures','replies'));
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

    public function search(Request $request){
        $posts = DB::table('posts')->where('title','like','%' . $request->search_title . '%')->leftJoin('users','posts.user_id','=','users.user_id')->get();
        return view('post_admin',compact('posts'));

    }

    public function delete($post){
        Post::destroy($post);
        return redirect('/post_admin');
    }

    public function delete_reply($post,$reply){
        post_reply::destroy($reply);
        return redirect('/post/' . $post);
    }
}
