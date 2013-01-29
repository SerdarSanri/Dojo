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
<body>

    <div id="content-main">
        <div class="row-fluid">
            <div class="well span6 well-wrapper-form">

                <form class="bs-docs-example form-inline" action="" method="post">
                    {{Form::token()}}

                    <fieldset>
                        <legend>Dojo Administration</legend>
                        @if(Session::get('error'))
                        <p class="errornote alert alert-error fade in">
                            <button data-dismiss="alert" class="close" type="button">×</button>
                            Username/Password not found or incorrect!
                        </p>
                        @endif
                        <div class="control-group">
                            <input type="text" placeholder="Username" class="span4 focused" name="username" id="username" required></div>
                        <div class="control-group">
                            <input type="password" placeholder="Password" class="span4" name="password" id="password" required></div>
                            <input class="btn btn-primary" type="submit" value="Login">

                    </fieldset>
                </form>
            
                <p class="forgotten-password">
                    <a href="">Forgotten your password or username?</a>
                </p>
                <p class="link-site-name">
                    <a href="">Dojo Bundle</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>