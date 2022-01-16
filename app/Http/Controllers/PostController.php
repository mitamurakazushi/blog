<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Storage;

class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('posts/index')->with(['posts' => $post->getPaginateByLimit()]);  
    }
    public function show(Post $post)
    {
        return view('posts/show')->with(['post' => $post]);
    }
    public function create()
    {
        return view('posts/create');
    }
    public function store(Request $request, Post $post)
    {
        $input = ['title' => $request->title];
        $input += ['body' => $request->body];
        $input += ['category' => $request->category];
        $input += ['latitude' => $request->latitude];
        $input += ['longitude' => $request->longitude];
        $input += ['user_id' => $request->user()->id];
        $input += ['iconurl' => $request->iconurl];
        if($request->image){
            $disk = Storage::disk('s3');
            //postされてきた画像
            $image = $request->image;
            $path = $disk->putFile('/images', $image,'public');
            $url = $disk->url($path);
            $input += ['image' => $url];
        }
        $post->fill($input)->save();
        return redirect('/user/posts');
    }
    public function edit(Post $post)
    {
        return view('posts/edit')->with(['post' => $post]);
    }
    public function update(PostRequest $request, Post $post)
    {
        $input = $request['post'];
        $input += ['user_id' => $request->user()->id];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/user/posts');
    }
}
