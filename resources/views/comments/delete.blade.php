@extends('main')

@section('title','| Comment Delete');

@section('content')


<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h1>Delete This Comment!</h1>
		<p>
			<strong>Name    :</strong>	{{$cmnt->name}}<br>
			<strong>Email   :</strong>	{{$cmnt->email}}<br>
			<strong>Comment :</strong>	{{$cmnt->comment}}<br>

			{{Form::open(['route'=>['comment.destroy',$cmnt->id],'method'=>'DELETE'])}}

			{{Form::submit('Delete!',['name'=>'submit','class'=>'btn btn-danger'])}}

			{{Form::submit('Cancel',['name'=>'submit','class'=>'btn btn-default'])}}

			{{Form::close()}}

		</p>
	</div>
</div>

@stop