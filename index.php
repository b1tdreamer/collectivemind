<?
require_once("login.php");if($loginCorrecto){ header("Location: home"); }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="b1tdreamer">
    <!-- Bootstrap core CSS -->
    <link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
    <link rel="icon" href="img/favicon.ico">
    <title>.: Collective Mind :.</title>
</head>
<body>
<div class="container">
  <img class="singin-logo" src="/2.0/img/bigBrain.png" width="220" height="166">
  <form class="form-signin" action="ingresar.php" method="post" name="login" class="form-signin" role="form">
  	<input name="user" type="text" placeholder="Username" required autofocus>
    <input name="password" type="password" placeholder="Password" required>
   	<input type="image" width="52" height="51" src="/2.0/img/btnLogin.png">
    <!--button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button-->
  </form>
</div>    
</body>
</html>
