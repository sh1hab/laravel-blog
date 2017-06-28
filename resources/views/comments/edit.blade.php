@extends('main')

@section('title',' | Comment Edit')

@section('content')

<h1>Edit Comment</h1>

<div class="row">
	<div class="col-md-8 col-md-offset-2 well" style="border-radius: 36">
		{{Form::model($cmnt,['route'=>['comment.update',$cmnt->id],'method'=>'PUT'])}}

		<!--'comment', 'route'=>'', -->
		{{Form::label('name',"Name:",['class'=>''])}}
		{{Form::text('name',null,['class'=>'form-control','disabled'=>''])}}


		{{Form::label('email','Email:',['class'=>''])}}
		{{Form::text('email',null,['class'=>'form-control','disabled'=>''])}}


		{{Form::label('comment','Comment:',['class'=>''])}}
		{{Form::textarea('comment',null,['class'=>'form-control','rows'=>'5'])}}

		{{Form::submit('Update Comment',['class'=>'btn btn-block btn-success'])}}

		{{Form::close()}}
	</div>	
</div>


@stop