 <div class="span8">
    <h2>Creating new post</h2>   
    <hr />
    {{ Form::open('dojo/articles/new', 'POST', array('enctype'=>'multipart/form-data')) }}
        {{ Form::hidden('post_author', $user->id) }}
        <!-- title field -->
        <p>{{ Form::label('post_title', 'Post Title') }}</p>
        <p>{{ Form::text('post_title', Input::old('post_title')) }}</p>
        <p>{{Form::label('tags','Tags:')}}</p>
        <p>{{Form::text('tags', Input::old('tags'))}}</p>
        <!-- body field -->
        {{Form::file('cover', array('name'=>'cover','id'=>'cover'))}}

        <p>{{ Form::label('post_body', 'Post Body') }}</p>
        <p>{{ Form::textarea('post_body', Input::old('post_body')) }}</p>
        <!-- submit button -->
        <p>{{ Form::submit('Create') }}</p>
    {{ Form::close() }}
</div>