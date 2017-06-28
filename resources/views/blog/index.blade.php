@extends('main')

@section('title','| Blog')

@section('content')

<div class="row " >
    <div class="col-md-12">
        <h1>Blog</h1>
    </div>
</div>

@foreach($posts as $post)
<div class="row" style=" padding-bottom: 15px; margin-bottom: 10px">
    <div class="col-md-offset-2 col-md-8" style="background-color: white; opacity: ;" >
        <h2>{{$post->title}}</h2>
        <h5>{{$post->created_at}}</h5>
        <p style="word-wrap: break-word;">{{ substr(strip_tags($post->body),0,300) }} 
            {{ strlen(strip_tags($post->body))>300 ? ".....":"" }}
        </p>
        <a href="{{route('blog.single',$post->slug)}} " class="btn btn-primary ">Keep reading</a>
    </div>
</div>
@endforeach
<div class="row">
    <div class="col-md-12 text-center">
        {{$posts->links()}}
    </div>
</div>
@stop