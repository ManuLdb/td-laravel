<!--Formulaire de création du post-->
<div class="panel-body">
    {!! Form::open(array('route'=>'comment.store', 'method'=>'POST')) !!}
    <div class="form-group">
        {{ Form::hidden('post_id', $post->id) }}
        {!! Form::label('content', 'Commentaire') !!}
        {!! Form::textarea('content', '', ['class'=>'form-control', 'placeholder'=>'Mon commentaire']) !!}
    </div>
    {!! Form::submit('Publier le commentaire', ['class' =>'btn btn-primary']) !!}
    {!! Form::close() !!}
</div>