@extends('main')

@section('title','| Edit POoSt')

@section('content')

    <div class="row">

        {{--form-model binding--}}

        {!! Form::model($post,[ 'route'=>['posts.update',$post->id ],'method'=>'PUT' ] ) !!}

        <div class="col-md-8">
            {!! Form::label('title','Title:' ) !!}
            {!! Form::text('title',null,["class" => "form-control input-lg"] ) !!}

            {!! Form::label('slug','Slug:',["class"=>"form-spacing-top"]) !!}
            {!! Form::text('slug',null,["class"=>"form-control "]) !!}

            {!! Form::label('body','Body:',["class"=>"form-spacing-top"] ) !!}
            {!! Form::textarea('body',null,["class" => "form-control "] ) !!}

        </div>
        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Created At:</dt>
                    {{--strtotime = string to time php function--}}
                    {{--php date function--}}
                    <dd>{{ date('M, j Y H:i',strtotime($post->created_at)) }} </dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Last Updated:</dt>
                    <dd>{{ date('M, j Y h:ia',strtotime($post->updated_at)) }}</dd>
                </dl>
                <div class="row">

                    <div class="col-sm-6">
                        {!! Html::linkRoute( 'posts.show','Cancel',array($post->id),array('class'=>'btn btn-danger btn-block') ) !!}

                    </div>

                    <div class="col-sm-6">
                        {!! Form::submit('Save Changes',['class'=>'btn btn-success btn-block']) !!}

                        {{--<a href="/posts.destroy" class="btn btn-danger btn-block">Delete</a>--}}
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>


@endsection