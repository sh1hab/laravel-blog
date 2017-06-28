@extends('main')

@section('title',' | Create')

@section('stylesheets')

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
            {!!Form::label('image','Upload Featured Image:')!!}
            {!!Form::file('image')!!}
        </div>

        <div class="form-group">
            {!!Form::label('body','Body:')!!}
            {!!Form::textarea('body',null,['class'=>'form-control' ] )!!}

        </div>

        <!-- <input type="hidden" name="_token" value="{{ Session::token() }}">{{-- laravel csrf token --}} -->
        {!!Form::submit('Create Post',['class'=>'btn btn-success btn-lg btn-block'] ) !!}
        {!!Form::close()!!}
    </div>
</div>﻿
@endsection