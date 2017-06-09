<?php

namespace App\Http\Controllers;


use App\Post;

class BlogController extends Controller
{

    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->Simplepaginate('5');

        return view('blog.index')->withPosts($posts);
    }

    public function getSingle($slug)
    {
        $post = Post::where('slug', '=', $slug)->first();

        return view('blog.single')->withPost($post);
    }


}
