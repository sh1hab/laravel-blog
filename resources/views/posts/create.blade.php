@extends('main')

@section('title',' | Create')

@section('stylesheets')

<!-- select2 -->

<!-- {!! Html::style('css/select2.min.css') !!}
-->
 <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
-->
<!-- {!! Html::script('js/select2.min.js') !!} -->

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/css/selectize.bootstrap2.min.css">

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/js/standalone/selectize.full.js"></script>

<script type="text/javascript">
    $('.input-tags').selectize();
</script>

<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<script type="text/javascript">
    $('.select2-multi').select2();
</script>
-->
<!-- WYSIWYG editor TinyMCE CDN -->

<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=km0fg9if69hv3u86guy83hzb27dn2gexz92ho4kewx6awtu3.googleusercontent.com"></script>

<script>tinymce.init({

    selector:'textarea',
    mode : "textareas",
    plugins: "emoticons , link , preview , image imagetools , insertdatetime , textcolor colorpicker ,wordcount,searchreplace ",
    // menubar: "insert",
    toolbar: "emoticons, link ,preview , image imagetools , insertdatetime , textcolor colorpicker,searchreplace,print ",
    branding: false,
    // theme : "advanced",
    // force_br_newlines : true,
    // force_p_newlines : false,
    forced_root_block : '',
});

</script>

@stop

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1>Create New Post</h1>
        <hr>

        {!!Form::open(array('route' => 'posts.store','files'=>true))!!}

        {{csrf_field()}}

        <div class="form-group">
            {!!Form::label('title','Title:')!!}
            {!!Form::text('title',null,['class'=>'form-control'] ) !!}
        </div>

        <div class="form-group">
            {!!Form::label('slug','Slug:' ) !!}
            {!!Form::text('slug',null,['class'=>'form-control'] ) !!}
        </div>

        <div class="form-group">
            {!! Form::label('category_id','Category:',["class"=>""])!!}
            {!! Form::select('category_id',$categories,null,["class"=>"form-control"]) !!}
        </div>

        <div class="form-group">
            {!! Form::label('tag_id','Tags',["class"=>""])!!}
            {!! Form::select('tag_id[]',$tags,null,["class"=>" form-control input-tags","multiple"=>"multiple"]) !!}
        </div>


        <div class="form-group">
            {!!Form::label('image','Upload Featured Image:')!!}
            {!!Form::file('image')!!}
        </div>

        <div class="form-group">
            {!!Form::label('body','Body:')!!}
            {!!Form::textarea('body',null,['class'=>'form-control'] )!!}

        </div>

        <!-- <input type="hidden" name="_token" value="{{ Session::token() }}">{{-- laravel csrf token --}} -->
        {!!Form::submit('Create Post',['class'=>'btn btn-success btn-lg btn-block'] ) !!}
        {!!Form::close()!!}
    </div>
</div>﻿
@endsection

@section('scripts')

<!-- {!! Html::script('js/parsley.min.js') !!} -->


@endsection