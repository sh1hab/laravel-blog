<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Purifier;
use Image;
use Intervention\Image\ImageManager;
use App\Http\Requests;

class PostController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }



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

        $categories=Category::pluck('name','id');

        //dd($categories);

        //$categories=array( $categories );

        return view('posts.create')->withCategories($categories);
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
            'category_id' => 'required | integer',
            'body' => 'required'
            ));


        $post = new Post();
        $post['title'] = $request->title;
        $post['slug'] = $request->slug;
        $post['body'] = Purifier::clean($request->body);
        $post['category_id']=$request->category_id;


        if( $request->hasFile('image') )// check if request has file 
        {

            $image=$request->file('image');// get  temporary image location

            $filename=time().".".$image->getClientOriginalExtension();// new image name

            $location=public_path('images/'.$filename);//image save location 
            // echo $location;
            // return ;

            //$manager = new ImageManager(array('driver' => 'gd'));

            //dd($request);
            $img=Image::make($image)->resize(800,400)->save($location);
            $post->image = $filename;
            //echo $img;
            //return ;

        }

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

        // dd($post);

        // $categories=Category::where('id',$post['category_id'])->value('name');

        // 

        // $categories[$post->category_id]=$categories->name;

        $categories=Category::pluck('name','id');

        //dd($categories);

        return view('posts.edit')->withPost($post)->withCategories($categories);

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
            'category_id' => 'required | integer',
            'body' => 'required'
            ));


        $post->title = $request->input('title');
        $post->slug = $request->slug;
        $post->category_id=$request->category_id;
        $post->body = Purifier::clean($request->input('body'));
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
