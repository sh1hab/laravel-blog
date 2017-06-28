@extends('main')

@section('title','| Tag index')

@section('content')

<div class="row">

	<div class="col-md-7 col-md-offset-1">
		<table class="table">
			<thead>
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($tags as $tag)
				<tr>
					<th>{{$tag->id}}</th>
					<td>{{$tag->name}}</td>
					<td>
						<tr>
							<td>Edit</td>
							<td>Delete</td>
						</tr>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>

	<div class="col-md-3 well">
		{!!Form::open(['Route'=>'tag.store']) !!}
		<fieldset>
			<legend>New Tag</legend>

			{!!Form::label('name','Name:',['class'=>'form-group']) !!}
			{!!Form::text('name',null,['class'=>'form-control']) !!}

			{!!Form::submit('Create New tag',['class'=>'btn btn-primary btn-block'])!!}
		</fieldset>
		{!!Form::close() !!}
	</div>


</div>

@endsection