 {{ Form::open('admin/articles/update', 'PUT',array('class'=>'form-horizontal')) }}

        @if($errors->has())
        <div>
                {{ $errors->first('title', '<span class="error-box">:message</span>') }}
                {{ $errors->first('post_body', '<span class="error-box">:message</span>') }}
        {{ $errors->first('slug', '<span class="error-box">:message</span>') }}
        {{ $errors->first('cover', '<span class="error-box">:message</span>') }}

        </div>
        <br />
        @endif


        <fieldset>
                <legend><h1>A actualizar artigo <b>{{$info->title}}</b></h1></legend><br/>
                <!--username field-->
                <div class="control-group">
                        {{Form::label('post_title','Titulo:',array('class'=>'control-label'))}}
                        <div class="controls">
                                {{Form::text('title', $info->title ,array('class' => 'round'))}}
                        </div>
                </div>

                <div class="control-group">
                        {{Form::label('post_body','Corpo do artigo:',array('class'=>'control-label'))}}
                        <div class="controls">
                                {{ Form::textarea('post_body', $info->post_body,array('class' => 'round')) }}
                        </div>
                </div>
        
                {{ Form::hidden('id', $info->id) }}

                <div class="control-group">
                        <div class="controls">
                                {{ Form::submit('Actualizar',array('class'=>'btn btn-primary')) }}  {{ Form::submit('Cancelar',array('class'=>'btn'))}}
                        </div>
                </div>

        {{ Form::close() }}
        </fieldset>