@extends('main')

@section('title','| Blog')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1>Blog</h1>
        </div>
    </div>

    @foreach($posts as $post)
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <h2>{{$post->title}}</h2>
                <h5>{{$post->created_at}}</h5>
                <p style="word-wrap: break-word;">{{$post->body}}</p>
                <a href="{{route('blog.single',$post->slug)}} " class="btn btn-primary">See moore</a>
            </div>
        </div>
    @endforeach
    <div class="row">
        <div class="col-md-12 text-center">
            {{$posts->links()}}
        </div>
    </div>
@stop