<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller
{
	public function index()
	{
		$tags=new Tag;
		$tags=Tag::all();

		return view('tag.index')->withTags($tags);

	}

	public function store(Request $request)
	{

		$tags=new Tag;

		$this->validate($request,array(
			'name'=>'required|max:255',
			));

		$tags['name']=$request['name'];
		$tags->save();

	}

	public function show($id)
	{
		$tags=new Tag;
		$tags=Tag::find($id);
		return view('tag.show')->withTags($tags);

	}
	public function edit()
	{

	}
	public function update()
	{

	}
	public function delete()
	{

	}

}
