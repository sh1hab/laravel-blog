@extends('main')

@section('title','')

@section('content')

<div class="row">
	<div class="col-md-12">

	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="well">
			<form action="{{Route('pp.update',Auth::user()->id)}}" method="POST" enctype="multipart/form-data">
				{{csrf_field()}}

				@if(!empty(Auth::user()->pp))
				<img src="{{url('/pp/' . Auth::user()->pp)}}" style="border-radius: 50%" height="150px" width="150px"  class="img-responsive" alt="profile image">
				@else
				<img src="{{url('/pp/' . 'index.png')}}" style="border-radius: 50%" height="150px" width="150px"  class="img-responsive" alt="profile image">
				@endif
				<input type="file" class="" name="pp">
				<input type="submit" name="" value="Upload Photo" class="btn btn-primary">
				<input type="submit" name="" value="Cancel" class="btn btn-default">
			</form>
		</div>
	</div>
</div>


@endsection