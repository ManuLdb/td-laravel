<!--Affichage des commentaires-->
<div class="panel-body">
    <h3>Commentaires</h3>
    @foreach($post->comments as $comment)
        <p><strong>{{$comment->user->name}}</strong></p>
        <p>{{ $comment->content }}</p>
        @if(Auth::check()
        && (Auth::user()->id ==$comment->user_id || Auth::user()->isAdmin))
            <a href="{{route('comment.edit', $comment->id)}}" class="glyphicon-envelope glyphicon glyphicon-pencil">
            </a>
            <a href="{{route('comment.destroy', $comment->id)}}" class=" h">
            </a>
            {!!Form::model($comment, array(
            'route'=>array('comment.destroy', $comment->id),
            'method'=>'DELETE'))
            !!}
            {!! Form::submit('Supprimer', ['class'=>'form-control']) !!}
            {!! Form::close() !!}
        @endif
    @endforeach
</div>