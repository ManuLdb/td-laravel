@if($errors->any())
    <div class="alert alert-danger">
        @if($errors->any())
            @foreach($errors->all() as $error)
                {{$error}}
            @endforeach
        @endif
    </div>
@endif



@if($success = Session::get('success'))
    <div class="alert alert-success">
        {{ $success }}
    </div>
@endif
