@extends('main')

@section('title','| Edit POoSt')

@section('stylesheets')

<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=km0fg9if69hv3u86guy83hzb27dn2gexz92ho4kewx6awtu3.googleusercontent.com"></script>

<script>tinymce.init({ 
    selector:'textarea',
    menubar:'false',
    theme:'modern',
    plugins: "link , image imagetools",
    branding:false,
    forced_root_block : '',

});

</script>

@stop

@section('content')

<div class="row">

    {{--form-model binding--}}

    {!! Form::model($post,[ 'route'=>['posts.update',$post->id ],'method'=>'PUT' ,'files'=>true ] ) !!}

    <div class="col-md-8">
        {!! Form::label('title','Title:' ) !!}
        {!! Form::text('title',null,["class" => "form-control input-lg"] ) !!}

        {!! Form::label('slug','Slug:',["class"=>"form-spacing-top"]) !!}
        {!! Form::text('slug',null,["class"=>"form-control "]) !!}

        {!! Form::label('category_id','Category:',["class"=>"form-spacing-top"])!!}
        {!! Form::select('category_id',$categories,null,["class"=>"form-control"]) !!}

        {!!Form::label('image','Upload Featured Image')!!}
        {!!Form::file('image',['onchange'=>"loadFile(event)"])!!}

        <img id="output" height="200px" width="200px" /><script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);};
        </script>


        {!! Form::label('body','Body:',["class"=>"form-spacing-top"] ) !!}
        {!! Form::textarea('body',null,["class" => "form-control"] ) !!}

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