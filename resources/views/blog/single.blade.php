@extends('main')

@section('title','| '.$post->title)

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>{{$post->title}}</h1>
            <p style="word-break: break-all">{{$post->body}}</p>
        </div>
    </div>

@endsection