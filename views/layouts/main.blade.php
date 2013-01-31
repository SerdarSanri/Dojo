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
    <div class="container-fluid">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <a class="brand" href="#" name="top">Dojo</a>
      <div class="nav-collapse collapse">
        <ul class="nav">
          <li><a href="{{URL::to('/dojo')}}"><i class="icon-home icon-white"></i> Home</a></li>
          <li class="divider-vertical"></li>
          <li class="active"><a href="{{URL::to('/dojo/articles')}}"><i class="icon-file icon-white"></i>Articles</a></li>
          <li class="divider-vertical"></li>
          <li><a href="{{URL::to('/dojo/projects')}}"><i class="icon-envelope icon-white"></i>Projects</a></li>
          <li><a href="{{URL::to('/dojo/settings')}}"><i class="icon-lock icon-white"></i>Settings</a></li>
          <li class="divider-vertical"></li>
        </ul>
        <div class="btn-group pull-right">
          <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="icon-user"></i> admin <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li><a href="#"><i class="icon-wrench"></i> Settings</a></li>
            <li class="divider"></li>
            <li><a href="#"><i class="icon-share"></i> Logout</a></li>
          </ul>
        </div>
      </div>
      <!--/.nav-collapse -->
    </div>
    <!--/.container-fluid -->
  </div>
  <!--/.navbar-inner -->
</div>
<!--/.navbar -->

<div id="main-container" class='container-fluid'>

        {{$content}}
    </div>

  <!-- FOOTER -->
  <div id="footer">

  
  </div> <!-- end footer -->
  {{Asset::container('footer')->scripts()}}
  </body>
</html>
