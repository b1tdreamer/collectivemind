<?
require_once("login.php");if(!$loginCorrecto){ header("Location: index.php?log_error=2"); }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>.: Collective Mind :.</title>
<link href="/2.0/css/jquery-ui-1.9.1.custom.css" rel="stylesheet" type="text/css">
<link href="/2.0/css/screens.css" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
<script src="/2.0/includes/jquery-1.8.2.js" type="text/javascript"></script>
<script src="/2.0/includes/jquery-ui-1.9.1.custom.js" type="text/javascript"></script>
<script src="/2.0/includes/ready.js" type="text/javascript"></script>
<!-- Favicon -->
<link rel="shortcut icon" type="image/ico" href="img/favicon.ico" media="screen" />
<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico" media="screen" />
<link rel="icon" type="image/ico" href="img/favicon.ico" media="screen" />
<link rel="icon" type="image/x-icon" href="img/favicon.ico" media="screen" />
<!-- End Favicon -->
</head>
<body>
<div id="menu">
	<? include_once('_menu.php');?>
</div>
<div id="content">
	<? include_once('modulos/_links.php');?>
	<div id="agenda"></div>
	<div class="clear"></div>
</div>
</body>
</html>