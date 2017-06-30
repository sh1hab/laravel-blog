@extends('main')

@section('title','| Index')

@section('content')
<div class="row">
    <div class="col-md-10">
        <h1>All Posts</h1>
    </div>

    <div class="col-md-2">
        <a href="{{route('posts.create')}}" class="btn btn-lg btn-block btn-primary btn-block btn-h1-spacing ">Create New POST</a>
    </div>
    <div class="col-md-12">
        <hr>
    </div>

</div>


<div class="row">
    <div class="col-md-12">
        <table class="table">
            <thead>
                <th>#</th>
                <th>Title</th>
                <th>Body</th>
                <th>Created At</th>
                <th>#</th>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <th>{{  $post->id }}</th>
                    <th>{{  $post->title }}</th>
                    <th>{{  substr(strip_tags($post->body),0,300)}} 
                        {{  strlen(strip_tags($post->body))>=50 ? "...":"" }}
                    </th>

                    <th>{{date('M, j Y',strtotime($post->created_at) ) }}</th>
                    <th><a href="{{route('posts.show',$post->id)}}" class="btn btn-default btn-sm">View</a>
                        <a href="{{route('posts.edit',$post->id)}}" class="btn btn-default btn-sm">Edit</a>
                    </th>
                </tr>
                @endforeach


            </tbody>

        </table>
        <div class="text-center">

            {{--pagination links--}}

            {!! $posts->links() !!}
            <h5>{!! "Page ". $posts->currentPage() ." of ". $posts->lastPage() !!}</h5>

        </div>

    </div>
</div>

@stop