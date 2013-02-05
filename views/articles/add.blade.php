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
     {{ Form::hidden('post_author', $user->id) }}
<fieldset class="module aligned wide">
    
    
    
            
            
                <div class="control-group  field-username">
                    
                        
                            
                                <div class="control-label"><label for="id_Title" class="required">Title:</label></div>
                                <div class="controls">
                                    
                                        
                                            <input id="id_Title" class="span8" type="text" name="post_title" maxlength="30" />
                                        
                                        
                                    

                                    

                                    
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
                                    {{ Form::textarea('post_body', '',array('id'=>'mytext')) }}
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
            
                <a href="{{URL::to_route('dojo::index_article')}}"><input type="submit" value="Save" name="_continue"  class="btn btn-primary"/></a>
            
            
                <a href="{{URL::to_route('dojo::index_article')}}"><input value="Cancel" name="_cancel"  class="btn"/></a>
            
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
