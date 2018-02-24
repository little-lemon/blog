<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Event; 
use App\Events\PostSaved;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    //
    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
       $title = $request->input('title');
       $content = $request->input('content');

       $post = new Post;
       $post->title = $title;
       $post->content = $content;
       $result = $post->save();
       Event::fire(new PostSaved($post));

       //return redirect('post/show/'.$url['category'].'/'.$url['term']);
    }

    public function show(Request $request,$id){
        if (Auth::check()) {
            echo '用户已登录...';
        }else{
            echo '未登录';
        }
        $user = Auth::user();
        dd($user);
        /* $post = Post::findOrFail($id);
        return $post; */
        // return view('post.show',['$post']);
    }

    public function update(Request $request, $id)
    {
        
    }
}
