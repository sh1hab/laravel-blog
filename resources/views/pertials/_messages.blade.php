@if( Session::has('success'))
    <div class="alert alert-success" role="alert">
        <strong>Success:</strong>{{Session::get('success')}}
    </div>
@endif

{{--form e kono error ache kina--}}
@if( count( $errors )>0 )
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>

@endif
