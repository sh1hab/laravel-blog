@extends('main')

@section('title','| View POoSt')

@section('content')

<div class="row" >
    <div class="col-md-8">


        @if(!empty($post->image))
        <img src="{{url('/images/' . $post->image)}}" height="800" width="400" alt="blog image">
        @endif
        <h1>{{$post->title}}</h1>
        <p class="lead" style="overflow-wrap:break-word;">{!!$post->body!!}</p>

        <div id="backend-comments" style="margin-top: 50px">
            <h3>Comments:<small>{{$post->comments()->count()}} Total</small></h3>

            @if($post->comments->count()>0)
            <table class="table">
                <thead style="color: #bdbdbd">
                    <tr>`
                        <th>Name</th>
                        <th>Email</th>
                        <th>Comments</th>
                        <td style="width: 50px"></td>
                    </tr>
                </thead>

                <tbody>
                    @foreach($post->comments as $cmnt)
                    <tr>
                        <td>{{$cmnt->name}}</td>
                        <td>{{$cmnt->email}}</td>
                        <td>{{$cmnt->comment}}</td>
                        <td>
                            <a href="{{route('comment.edit',$cmnt->id)}}" class="btn btn-xs btn-primary "><span class="glyphicon glyphicon-pencil"></span></a>
                            <a href="{{route('comment.delete',$cmnt->id)}}" class="btn btn-xs btn-danger "><span class="glyphicon glyphicon-trash"></span></a>
                            

                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
            
        </div>

    </div>
    <div class="col-md-4">
        <div class="well text-center">

            <dl class="dl-vertical">
                <dt>Url:</dt>

                <dd><a href="{{ route('blog.single', $post->slug) }}">{{ route('blog.single', $post->slug) }}</a></dd>
            </dl>
            <dl class="dl-vertical">
            <dt>Author:</dt>
                <dd>{{$post->user->name}}</dd>
            </dl>
            <dl class="dl-vertical">
                <dt>Created At:</dt>
                {{--strtotime = string to time php function--}}
                {{--php date function--}}
                <dd>{{ date('M, j Y H:i',strtotime($post->created_at)) }} </dd>
            </dl>
            <dl class="dl-vertical">
                <dt>Last Updated:</dt>
                <dd>{{ date('M, j Y h:ia',strtotime($post->updated_at)) }}</dd>
            </dl>
            <div class="row">

                <div class="col-sm-6">
                    {!! Html::linkRoute( 'posts.edit','EDIT',array($post->id),array('class'=>'btn btn-success btn-block') ) !!}

                </div>

                <div class="col-sm-6">
                    {!! Form::open( ['route'=>['posts.destroy',$post->id],'method'=>'DELETE']  ) !!}
                    {!! Form::submit( 'Delete' , ['class'=>'btn btn-danger btn-block' ] ) !!}

                    {!! Form::close() !!}


                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    {{Html::linkRoute('posts.index','<< See All Posts',array(),['class'=>'btn btn-default btn-block btn-h1-spacing']) }}
                </div>
            </div>

        </div>
    </div>
</div>


@endsection