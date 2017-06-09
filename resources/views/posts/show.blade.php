@extends('main')

@section('title','| View POoSt')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>{{$post->title}}</h1>
            <p class="lead" style="overflow-wrap:break-word;">{{$post->body}}</p>
        </div>
        <div class="col-md-4">
            <div class="well text-center">

                <dl class="dl-vertical">
                    <dt>Url:</dt>
                    {{--strtotime = string to time php function--}}
                    {{--php date function--}}
                    <dd><a href="{{url($post->slug)}}">{{url($post->slug)}}</a></dd>
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