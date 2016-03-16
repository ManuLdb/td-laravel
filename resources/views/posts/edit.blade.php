@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            @include('errors.message')
            <div class="col-md-10 col-md-offset-1">
                <div class="panel-default panel">
                    <div class="panel-heading">Editer un article</div>
                    <div class="panel-body">
                        @if(Auth::check()
                        && (Auth::user()->id ==$post->user_id || Auth::user()->isAdmin))
                        {!! Form::model($post,
                         array(
                         'route'=>array('post.update', $post->id), 'method'=>'PUT')) !!}
                        <div class="form-group">
                            {!! Form::label('title', 'Titre') !!}
                            {!! Form::text('title', old('title'), ['class'=>'form-control', 'placeholder'=>'Mon titre']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('content', 'Message') !!}
                            {!! Form::textarea('content', old('content'), ['class'=>'form-control', 'placeholder'=>'Mon contenu']) !!}
                        </div>
                        {!! Form::submit('Publier l\'article', ['class' =>'btn btn-primary']) !!}
                        {!! Form::close() !!}
                            @else
                        <p>Vous n'avez pas les droits suffisants</p>
                            <a href="{{route('post.show', $post->id) }}" class="form-control">Retour à l'article</a>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
