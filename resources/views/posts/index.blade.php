@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            @include('errors.message')
            @foreach($list as $post)
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel-default panel">
                        <div class="panel-heading">
                            <a href="{{route('post.show', $post->id)}}">
                                {{$post->title}}
                            </a>
                        </div>
                        <div class="panel-body">
                            {{$post->content}}
                        </div>
                    </div>
                </div>
                @endforeach
            {!! $list -> links() !!}
        </div>
    </div>
@endsection
