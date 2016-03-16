@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel-default panel">
                    <div class="panel-body">
                        <p>Nom :  {{ Auth::user()->name }}</p>
                    </div>
                    <div class="panel-body">
                        <p>Email :  {{ Auth::user()->email }}</p>
                    </div>
                    <div class="panel-body">
                        <p>Date de création : {{ Auth::user()->created_at }}</p>
                    </div>
                    <div class="panel-body">
                        <a href="{{route('user.edit', Auth::user()->id)}}"
                           class="glyphicon-envelope glyphicon glyphicon-pencil">
                            Modifier le mot de passe
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
