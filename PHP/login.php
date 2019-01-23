<?php
session_start();
require_once 'scripts/login_script.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">

    <title>Login | BANG!</title>

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

</head>

<body class="login-img3-body">

<div class="container">

    <form class="login-form" method="POST" action="">
        <div class="login-wrap">
            <p class="login-img"><i class="icon_lock_alt"></i></p>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_profile"></i></span>
                <input type="text" class="form-control" name="gebruikersnaam" placeholder="Gebruikersnaam" autofocus>
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input type="password" class="form-control" name="wachtwoord" placeholder="Wachtwoord">
            </div>
            <button class="btn btn-primary btn-lg btn-block" type="submit" name="inloggen">Log in</button>
        </div>
    </form>
    <div class="text-right">
        <div class="credits">

        </div>
    </div>
</div>


</body>

</html>

