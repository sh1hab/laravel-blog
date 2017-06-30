

@extends('main')

@section('title','| Category')

@section('content')


<div class="row">

	
	<div class="col-md-8 col-md-offset-1">

		<h2>Categories</h2>
		<table class="table">
			<thead>
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>Action</th>
				</tr>
			</thead>

			<tbody>
				@foreach($categories as $category)
				<tr>
					<th>{{$category->id}}</th>
					<td><i>{{ $category->name }}</i></td>
					<td></td>
				</tr>
				@endforeach
			</tbody>
			
		</table>
		


	</div>


	<div class="col-md-3">
		<div class="well">
			{!! Form::open(['route'=>'category.store','method'=>'POST']) !!}
			<fieldset class="scheduler-border">
				<legend class="scheduler-border">New Category:</legend>	


				{!! Form::label('name','Name:',['class'=>'form-group']) !!}
				{!! Form::text('name',null,['class'=>'form-control'] ) !!}

				{!!Form::submit('Create New Category',['class'=>'btn btn-primary btn-block'])!!}

			</fieldset>
			{!! Form::close() !!}
		</div>
	</div>






	@endsection