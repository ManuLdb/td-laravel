@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            @include('errors.message')
            <div class="col-md-10 col-md-offset-1">
                <div class="panel-default panel">
                    <div class="panel-heading">Changer votre mot de passe</div>
                    <div class="panel-body">
                        @if(Auth::check()
                        && (Auth::user()->id ==$user->id || Auth::user()->isAdmin))
                            {!! Form::model($user,
                             array(
                             'route'=>array('user.update', $user->id), 'method'=>'PUT')) !!}
                            <div class="form-group">
                                {!! Form::label('password', 'Ancien mot de passe') !!}
                                {!! Form::password('old_password', ['class'=>'form-control', 'placeholder'=>'Mon contenu']) !!}
                                {!! Form::label('password', 'Mot de passe') !!}
                                {!! Form::password('password', ['class'=>'form-control', 'placeholder'=>'Mon contenu']) !!}
                                {!! Form::label('password', 'Vérification mot de passe') !!}
                                {!! Form::password('password_confirmation', ['class'=>'form-control', 'placeholder'=>'Mon contenu']) !!}
                            </div>
                            {!! Form::submit('Changer votre mot de passe', ['class' =>'btn btn-primary']) !!}
                            {!! Form::close() !!}
                        @else
                            <p>Vous n'avez pas les droits suffisants</p>
                            <a href="{{route('user.index') }}" class="form-control">Retour à l'article</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
