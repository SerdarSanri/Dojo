<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login</title>
    {{Asset::container('header')->styles()}}
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body class="login">


    <!-- Header -->
    <div id="header" class="navbar navbar-inverse navbar-fixed-top">
        
    </div>
    <!-- END Header -->

<!-- Container -->
<div id="main-container" class='container-fluid'>

    
        
    
<body class="login">


    <!-- Header -->
    <div id="header" class="navbar navbar-inverse navbar-fixed-top">
        
    </div>
    <!-- END Header -->

<!-- Container -->
<div id="main-container" class='container-fluid'>

    
        
    

    
        
    

    <!-- Content -->
    <div id="content" class="colM">
        
        
        
<div id="content-main">
    <div class="row-fluid">
        <div class="well span6 well-wrapper-form">
            <img class="img-circle logo-admin" src="/static/admin/img/logo-140x140.png" alt="example.com">
            <form class="bs-docs-example form-inline" id="login-form" action="" method="post">
                <div style='display:none'> {{Form::token()}}</div>
                <fieldset>
                    <legend>
                        Dojo administration - Log in
                    </legend>
                     @if(Session::get('error'))
                        <p class="errornote alert alert-error fade in">
                            <button data-dismiss="alert" class="close" type="button">×</button>
                            Username/Password not found or incorrect!
                        </p>
                        @endif
                    
                    <div class="control-group ">
                        <input type="text" placeholder="Username" class="span4" name="username" id="username" class=" focused" value="">
                    </div>
                    <div class="control-group ">
                        <input type="password" placeholder="Password" class="span4" name="password" id="password" value="">
                    </div>
                    
                    <input class="btn btn-primary" type="submit" value="Log in">
                </fieldset>
            </form>
            
            
            <p class="link-site-name">
                <a href="">
                    Dojo
                </a>
            </p>
        </div>
    </div>
</div>

        
        <br class="clear" />
    </div>
    <!-- END Content -->

    <div id="footer"></div>
</div>
<!-- END Container -->

</body>
</html>