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
        <a href="" class="active">New</a>
        <span class="divider">/</span>
    </li>
</ul>           
  <div id="content" class="colM">
        
        <h1>Add Article</h1>
        
<div id="content-main">
    
        
    
    <form enctype="multipart/form-data" action="" method="post" id="user_form" class="form-horizontal well">{{Form::token()}}
     {{ Form::hidden('author_id', $user->id) }}
<fieldset class="module aligned wide">
    
    
    
            
            
                <div class="control-group  field-username">
                    
                        
                            
                                <div class="control-label"><label for="id_Title" class="required">Title:</label></div>
                                <div class="controls">
                                    
                                        
                                            <input id="id_Title" class="span8" type="text" name="title" maxlength="30" />
                                        
                                        
                                    

                                    

                                    
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
            

                <div class="control-group">
                    <div class="control-label"><label for="id_password2" class="required">Draft:</label></div>
                                <div class="controls">
                                    {{Form::select('draft', array(0 => 'No',1 => 'Yes'),0)}}
                               </div>
                    </div>
                     <div class="control-group">
                    <div class="control-label"><label for="id_password2" class="required">Published:</label></div>
                                <div class="controls">
                                      {{Form::select('published', array(0 => 'No',1 => 'Yes'),0)}}
                                </div>
                    </div>
                     <div class="control-group">
                    <div class="control-label"><label for="id_password2" class="required">Cover:</label></div>
                                <div class="controls">
                                      <input type="file" placeholder="Choose a photo to upload" name="cover" id="cover" />
                                </div>
                    </div>
                    <div class="control-group">
                    <div class="control-label"><label for="id_password2" class="required">Post Body:</label></div>
                                <div class="controls">
                                    {{ Form::textarea('post_body', '',array('id'=>'post_body')) }}
                                </div>
                    </div>

                </div>   
                </div>   
             
            
    
</fieldset>


    
    
    

    

    
<div class="form-actions navbar navbar-fixed-bottom">
    <div class="container">
        <div class="pull-left delete-link-box">
            
        </div>
        <div class="pull-right save-options-box">
            
                <a href="{{URL::to_route('dojo::index_article')}}"><input type="submit" value="Save" class="btn btn-primary"/></a>
            
            
                <a href="{{URL::to_route('dojo::index_article')}}"><input value="Cancel"   class="btn"/></a>
            
        </div>
    </div>
</div>


    
{{Asset::container('footer')->scripts()}}
        <script type="text/javascript">
               $(function() {
                     $('#post_body').redactor({
                           imageUpload: '{{URL::to_route("dojo::new_image")}}',
                           
                     });
               });
</script>

    </form>
</div>
