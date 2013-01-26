<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    {{Asset::container('header')->styles()}}
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <style type="text/css">
    body{
       padding-top: 60px;
                padding-bottom: 40px;
    }
    </style>

   </head>
  <body>
     <!-- TOP BAR -->
   <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                   <a href="{{URL::to('/')}}" class="btn btn-primary navbutton"><i class="icon-circle-arrow-left"></i>Return to WebSite</a> 
                   <div class="nav-collapse collapse">
                        <ul class="nav">
                         
                             <li><a href="{{URL::to('dojo/logout')}}" class="round button dark menu-logoff"><i class="icon-off"></i>Log out</a></li>
                        </ul>
                                          
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>

<div class="container">
  <div class="row">
    <div class="navbar-inner">
      <h3>Dojo Administration</h3>

    </div>
    <br />

    <div class="row-fluid">
      <div class="span3">
        <ul class="nav nav-list well">
          <li class="nav-header">Dashboard</li>
          <li><a href="{{URL::to('dojo/users')}}"><i class="icon-user"></i>Users</a></li>
          <li><a href="{{URL::to('dojo/articles')}}"><i class="icon-pencil"></i>Articles</a></li>
          <li><a href="{{URL::to('dojo/projects')}}"><i class="icon-briefcase"></i>Projects</a></li>
          <li><a href="{{URL::to('dojo/contacts')}}"><i class="icon-dashboard"></i>Contacts</a></li>
          <li><a href="{{URL::to('dojo/settings')}}"><i class="icon-dashboard"></i>Settings</a></li>
        </ul>
      </div>
      <div class="span9">
 
        {{$content}}
      </div>
    </div>
  </div>
</div>  

  <!-- FOOTER -->
  <div id="footer">

  
  </div> <!-- end footer -->
  {{Asset::container('footer')->scripts()}}
  </body>
</html>
