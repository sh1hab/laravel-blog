<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

use App\Http\Requests;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        //$posts = Post::all();

        //laravel pagination

        //$posts = Post::latest()->paginate(2);

        $posts = Post::orderby('id', 'desc')->paginate(3);

        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        //validated data

        $this->validate($request, array(
            'title' => 'required | max:255',
            'slug' => 'required | alpha_dash | min:5 | max:255 | unique:posts,slug',
            'body' => 'required'
        ));


        $post = new Post();
        $post['title'] = $request->title;
        $post['slug'] = $request->slug;
        $post['body'] = $request->body;
        $post->save();

        Session::flash('success', 'Your blog post has been saved');//session flash message ekbar e show kore

        //$post['title']

        //inserted into database
        //Post::create($request->all());
        //redirecting to another page

        return redirect()->route('posts.show', $post->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);//primary key diye db te search

        //$post = DB::table('Posts')->where('id', $id)->first();

        return view('posts.show')->withPost($post);//magic method
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::find($id);

        return view('posts.edit')->withPost($post);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $post = Post::find($id);

        $this->validate($request, array(
            'title' => 'required | max:255',
            'slug' => ($request->slug != $post->slug) ? 'required | alpha_dash | min:5 | max:255 | unique:posts,slug' : '',
            'body' => 'required'
        ));


        $post->title = $request->input('title');
        $post->slug = $request->slug;
        $post->body = $request->input('body');
        $post->save();

        Session::flash('success', 'Your Post has been Successfuly Updated');

        return redirect()->route('posts.show', $post->id);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        Session::flash('success', 'Your Post Has Been Deleted');

        return redirect()->route('posts.index');

    }
}
