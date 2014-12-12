<?
require_once("includes/funciones.php");
require_once("login.php");if($loginCorrecto){ header("Location: hipotalamo.php"); }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">
<html>
<head>
<title>.: Collective Mind :.</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!-- estilos -->
<link href="/2.0/css/reset.css" rel="stylesheet" type="text/css">
<link href="/2.0/css/login.css" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
<!-- Favicon -->
<link rel="shortcut icon" type="image/ico" href="img/favicon.ico" media="screen" />
<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico" media="screen" />
<link rel="icon" type="image/ico" href="img/favicon.ico" media="screen" />
<link rel="icon" type="image/x-icon" href="img/favicon.ico" media="screen" />
<!-- End Favicon -->
</head>
<body>
  <img id="logo" src="/2.0/img/bigBrain.png" width="220" height="166">
  <form action="ingresar.php" method="post" name="login" id="login">
  	<label for="user">Usuario:</label>
  	<input name="usuario" type="text">
	<label for="">Contrase&ntilde;a:</label>
    <input name="password" type="password">
   	<input type="image" width="52" height="51" src="/2.0/img/btnLogin.png">
  </form>
</body>
</html>
