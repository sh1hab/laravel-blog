<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;
use Session;
use Purifier;


class CommentController extends Controller
{


	public function __construct()
	{
		$this->middleware('auth');
	}

	public function edit($id)
	{

		
		$cmnt=Comment::find($id);

		return view('comments.edit')->withCmnt($cmnt);

	}

	public function update(Request $request ,$id)
	{
		$cmnt=Comment::find($id);

		$this->validate($request,array(
			'comment'=>'required',

			));
		$cmnt->comment=Purifier::clean($request->comment);
		$cmnt->save();


		Session::flash('success','Comment Updated!');

		return redirect()->route('posts.show',$cmnt->post_id);

	}


    //
	public function store(Request $request,$post_id)
	{

		$this->validate($request,array(
			'name'=>'required|max:255',
			'email'=>'required|email|max:255',
			'comment'=>'required| min:5 |max:200'

			));

		$comments=new Comment;
		$comments->name=$request->name;
		$comments->email=$request->email;
		$comments->comment=$request->comment;
		$comments->approved=true;

		// dd($comments);

		$post=new Post();
		$post=Post::find($post_id);

		$comments->post()->associate($post);

		$comments->save();

		Session::flash('success','Your Comment has been saved');

		return redirect()->route('blog.single',$post->slug);
	}

	public function delete($id)
	{
		$cmnt=Comment::find($id);

		return view('comments.delete')->withCmnt($cmnt);
	}


	public function destroy(Request $request,$id)
	{
		$cmnt=Comment::find($id);

		$post_id=$cmnt->post_id;

		if( $request->submit=="Delete!" )
		{	
			$cmnt->delete();

			Session::flash('success','Comment deleted!');

			
		}

		return redirect()->route('posts.show',$post_id);
		
	}

}
