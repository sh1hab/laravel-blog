@extends('main')

@section('title','| '.$post->title)

@section('stylesheets')




@endsection

@section('content')

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h1>{{$post->title}}</h1>
		<p style="word-break: break-all">{!!$post->body!!}</p>
		<hr>
		<p><b>Posted in: </b>{{ $post->category->name }}</p>

	</div>
</div>

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h3 class="comments-title"><span class="glyphicon glyphicon-comment"></span>  {{ $post->comments()->count() }} Comments</h3>
		@foreach($post->comments as $comment)
		<div class="comment">
			<div class="author-info">

				<img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) . "?s=50&d=wavatar&r=pg" }}" class="author-image">
				<div class="author-name">
					<h4>{{ $comment->name }}</h4>
					<p class="author-time">{{ date('F dS, Y - g:iA' ,strtotime($comment->created_at)) }}</p>
					<p class="author-time">Updated At: {{$comment->updated_at->diffForHumans()}}</p>
				</div>

			</div>

			<div class="comment-content">
				{!! $comment->comment !!}
			</div>

			

		</div>
		@endforeach
	</div>
</div>


<div class="row">
	<div id="comment-form" class="col-md-8 col-md-offset-2" style="margin-top: 50px">
		{{Form::open(['route'=>['comment',$post->id],'method'=>'POST'])}}
		<div class="row">
			<div class="col-md-12">

				<div class="col-md-6 form-group">
					{{Form::label('name',"Name:",['class'=>''])}}
					{{Form::text('name',null,['class'=>'form-control'])}}
				</div>

				<div class="col-md-6 form-group">
					{{Form::label('email','Email:',['class'=>''])}}
					{{Form::email('email',null,['class'=>'form-control'])}}		

				</div>
				<div class="form-group col-md-12">
					{{Form::label('comment','Comment:',['class'=>''])}}
					{{Form::textarea('comment',null,['class'=>'form-control','rows'=>'5'])}}
				</div>

				{{Form::submit('submit',['class'=>'btn btn-block btn-primary','style'=>'margin-top:50 px'])}}

			</div>

		</div>
		
		{{Form::close()}}
	</div>
</div>

@endsection