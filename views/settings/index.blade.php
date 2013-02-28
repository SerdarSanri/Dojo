<div class="tabbable tabs-left"> <!-- Only required for left/right tabs -->
  <ul class="nav nav-tabs">
    <li class="active"><a href="#tab1" data-toggle="tab">Social Networks</a></li>
    <li><a href="#tab2" data-toggle="tab">General Settings</a></li>
    <li><a href="#tab2" data-toggle="tab">Maintance</a></li>
  </ul>
  <div class="tab-content">
    <div class="tab-pane active" id="tab1">
    
  <div id="content" class="colM">
                
<div id="content-main">
    
        
    
    <form enctype="multipart/form-data" action="settings/social" method="post" id="user_form" class="form-horizontal well">{{Form::token()}}
<fieldset class="module aligned wide">
                  <div class="control-group  field-username">
                    <div class="control-label"><label for="id_Title" class="required"><i class="icon-github"></i>Twitter:</label></div>
                      <div class="controls">
                        <input id="id_Title" class="span8" type="text" name="twitter" maxlength="30" />
                         
                      </div>
                    </div>
                    <div class="control-group  field-username">
                    <div class="control-label"><label for="id_Title" class="required"><i class="icon-github"></i>Google+:</label></div>
                      <div class="controls">
                        <input id="id_Title" class="span8" type="text" name="gplus" maxlength="30" />
                         
                      </div>
                    </div>
                    <div class="control-group  field-username">
                    <div class="control-label"><label for="id_Title" class="required"><i class="icon-github"></i>Facebook:</label></div>
                      <div class="controls">
                        <input id="id_Title" class="span8" type="text" name="facebook" maxlength="30" />
                         
                      </div>
                    </div>
                    <div class="control-group  field-username">
                    <div class="control-label"><label for="id_Title" class="required"><i class="icon-github"></i>linkedin:</label></div>
                      <div class="controls">
                        <input id="id_Title" class="span8" type="text" name="linkedin" maxlength="30" />
                         
                      </div>
                    </div>
                    <div class="control-group  field-username">
                    <div class="control-label"><label for="id_Title" class="required"><i class="icon-github"></i>Bitbucket:</label></div>
                      <div class="controls">
                        <input id="id_Title" class="span8" type="text" name="bitbucket" maxlength="30" />
                         
                      </div>
                    </div>
                    <div class="control-group  field-username">
                    <div class="control-label"><label for="id_Title" class="required"><i class="icon-github"></i>Github:</label></div>
                      <div class="controls">
                        <input id="id_Title" class="span8" type="text" name="github" maxlength="30" />
                         
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


    </form>

    </div>

    <div class="tab-pane" id="tab2">
      <p>Howdy, I'm in Section 2.</p>
    </div>
    <div class="tab-pane" id="tab3">
      <p>Howdy, I'm in Section 2.</p>
    </div>
  </div>
</div>