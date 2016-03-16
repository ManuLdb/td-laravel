@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel-default panel">
                        <div class="panel-heading">
                            <a href="{{route('post.index')}}" class="glyphicon glyphicon-triangle-left"></a>
                            {{$post->title}}
                        </div>
                        <div class="panel-body">
                            {{$post->content}}
                            @if(Auth::check()
                            && (Auth::user()->id ==$post->user_id || Auth::user()->isAdmin))
                            {!!Form::model($post, array(
                            'route'=>array('post.destroy', $post->id),
                            'method'=>'DELETE'))
                            !!}
                            {!! Form::submit('Supprimer', ['class'=>'form-control']) !!}
                            {!! Form::close() !!}
                            <br>
                            <a href="{{route('post.edit', $post->id)}}" class="form-control">Editer</a>
                            @endif
                        </div>
                        @include('comments.show')
                        @if(Auth::check())

                             @include('comments.create', array($post))
                        @endif
                    </div>
                </div>
        </div>
    </div>
@endsection
