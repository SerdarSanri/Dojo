
<ul class="breadcrumb">
    <li>
        <a href="{{URL::to('/dojo')}}">Home</a>
        <span class="divider">/</span>
    </li>
    <li>
        <a href="{{URL::to('/dojo/projects')}}" class="active">Projects</a>
        <span class="divider">/</span>
    </li>
     <li>
        <a href="" class="active">Edit</a>
        <span class="divider">/</span>
    </li>
</ul>
  <div id="content" class="colM">
        
        <h1>Editing project "{{$project->title}}" </h1>
        
<div id="content-main">
    
        
    
    <form enctype="multipart/form-data" action="{{URL::to_route('dojo::update_project')}}" method="POST" id="user_form" class="form-horizontal well">{{Form::token()}}
     {{ Form::hidden('id', $id) }}
<fieldset class="module aligned wide">
                 @if($errors->has())
        <div class="control-group">
                {{ $errors->first('title', '<span class="error-box">:message</span>') }}
                {{ $errors->first('post_body', '<span class="error-box">:message</span>') }}
        {{ $errors->first('slug', '<span class="error-box">:message</span>') }}
        {{ $errors->first('cover', '<span class="error-box">:message</span>') }}

        </div>
        <br />
        @endif
    
    
            
            
                <div class="control-group  field-username">
                    
                        
                            
                                <div class="control-label"><label for="id_Title" class="required">Title:</label></div>
                                <div class="controls">
                                    
                                             {{Form::text('title', $project->title ,array('class' => 'span8','maxlength'=>'255'))}}
                                        
                                        
                                    

                                    

                                    
                                        <p class="help-block">
                                            Required. 30 characters or fewer. Letters, digits and /./+/-/_ only.
                                        </p>
                                    

                                </div>
                            
                        

                </div>
            
                <div class="control-group">
                    <div class="control-label"><label for="id_password2" class="required">Draft:</label></div>
                                <div class="controls">
                                    {{Form::select('draft', array(0 => 'No',1 => 'Yes'),$project->draft)}}
                               </div>
                    </div>
                     <div class="control-group">
                    <div class="control-label"><label for="id_password2" class="required">Published:</label></div>
                                <div class="controls">
                                      {{Form::select('published', array(0 => 'No',1 => 'Yes'),$project->published)}}
                                </div>
                    </div>
                    <div class="control-group">
                    <div class="control-label"><label for="id_password2" class="required">Cover:</label></div>
                                <div class="controls">
                                    {{ Form::textarea('project_body', $project->project_body) }}
                                </div>
                    </div>

                </div>   
        
             
            
    
</fieldset>


    
    
    

    

    
<div class="form-actions navbar navbar-fixed-bottom">
    <div class="container">
        <div class="pull-left delete-link-box">
            
        </div>
        <div class="pull-right save-options-box">
                                            {{ Form::submit('Actualizar',array('class'=>'btn btn-primary')) }}  {{ Form::submit('Cancelar',array('class'=>'btn'))}}

        </div>
    </div>
</div>


    
{{Asset::container('footer')->scripts()}}
        <script type="text/javascript">
               $(function() {
                     $('#mytext').redactor({
                           imageUpload: '{{URL::to_route("dojo::new_image_project")}}',
                           
                     });
               });
</script>

    </form>
</div>
