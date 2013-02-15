
<ul class="breadcrumb">
    <li>
        <a href="{{URL::to('/dojo')}}">Home</a>
        <span class="divider">/</span>
    </li>
    <li>
        <a href="{{URL::to('/dojo/articles')}}" class="active">Articles</a>
        <span class="divider">/</span>
    </li>
     <li>
        <a href="" class="active">Edit</a>
        <span class="divider">/</span>
    </li>
</ul>
  <div id="content" class="colM">
        
        <h1>Editing Article "{{$article->title}}" </h1>
        
<div id="content-main">
    
        
    
    <form enctype="multipart/form-data" action="update" method="POST" id="user_form" class="form-horizontal well">{{Form::token()}}
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
                                    
                                             {{Form::text('title', $article->title ,array('class' => 'span8','maxlength'=>'30'))}}
                                        
                                        
                                    

                                    

                                    
                                        <p class="help-block">
                                            Required. 30 characters or fewer. Letters, digits and /./+/-/_ only.
                                        </p>
                                    

                                </div>
                            
                        

                </div>
            
    
            
            
                <div class="control-group  field-password1">
                    
                        
                            
                                <div class="control-label"><label for="tags" class="required">Tags:</label></div>
                                <div class="controls">
                                    
                                        
                                            <input id="id_password1" type="text" name="tags" class="span8" />
                                        
                                        
                                    

                                    

                                    

                                </div>
                            
                        

                </div>
            
    
            
            <!--
                <div class="control-group  field-password">
                    
                        
                            
                                <div class="control-label"><label for="id_password2" class="required">Cover:</label></div>
                                <div class="controls">
                                    
                                        
                                             {{Form::file('cover', array('name'=>'cover','id'=>'cover'))}}
                                        
                                        
                                    

                                    

                                    
                                        <p class="help-block">
                                            Enter the same password as above, for verification.
                                        </p>
                                    

                                </div>
                            
                        

                </div> -->
                <div class="control-group">
                    <div class="control-label"><label for="id_password2" class="required">Draft:</label></div>
                                <div class="controls">
                                    {{Form::select('draft', array(0 => 'No',1 => 'Yes'),$article->draft)}}
                               </div>
                    </div>
                     <div class="control-group">
                    <div class="control-label"><label for="id_password2" class="required">Published:</label></div>
                                <div class="controls">
                                      {{Form::select('published', array(0 => 'No',1 => 'Yes'),$article->published)}}
                                </div>
                    </div>
                    <div class="control-group">
                    <div class="control-label"><label for="id_password2" class="required">Cover:</label></div>
                                <div class="controls">
                                    {{ Form::textarea('post_body', $article->post_body) }}
                                </div>
                    </div>

                </div>   
        
             
            
    
</fieldset>


    
    
    

    

    
<div class="form-actions navbar navbar-fixed-bottom">
    <div class="container">
        <div class="pull-left delete-link-box">
            
        </div>
        <div class="pull-right save-options-box">
            
                <input type="submit" value="Save" class="btn btn-primary"/>
            
            
                <input value="Cancel" class="btn"/>
            
        </div>
    </div>
</div>


    
{{Asset::container('footer')->scripts()}}
        <script type="text/javascript">
               $(function() {
                     $('#mytext').redactor({
                           imageUpload: '{{URL::to_route("dojo::new_image")}}',
                           
                     });
               });
</script>

    </form>
</div>
