<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;


class pagesController extends Controller
{

    public function index()
    {

        $posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
        return view('pages.index')->withPosts($posts);
    }

    public function about()
    {
        return view('pages.about');
    }

    public function contact()
    {
        return view('pages.contact');
    }

}
