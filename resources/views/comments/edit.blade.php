@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            @include('errors.message')
            <div class="col-md-10 col-md-offset-1">
                <div class="panel-default panel">
                    <div class="panel-heading">Editer un commentaire</div>
                    <div class="panel-body">
                        @if(Auth::check()
                        && (Auth::user()->id ==$comment->user_id || Auth::user()->isAdmin))
                            {!! Form::model($comment,
                             array(
                             'route'=>array('comment.update', $comment->id), 'method'=>'PUT')) !!}
                            <div class="form-group">
                                {!! Form::label('content', 'Commentaire') !!}
                                {!! Form::textarea('content', old('content'), ['class'=>'form-control', 'placeholder'=>'Mon commentaire']) !!}
                            </div>
                            {!! Form::submit('Editer le commentaire', ['class' =>'btn btn-primary']) !!}
                            {!! Form::close() !!}
                        @else
                            <p>Vous n'avez pas les droits suffisants</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
