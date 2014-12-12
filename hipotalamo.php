<?
require_once("login.php");if(!$loginCorrecto){ header("Location: index.php?log_error=login"); }
if($_GET['mode'])
{
    $mode = mysqli_real_escape_string($link,$_GET['mode']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?=ucfirst($mode)?> | Collective mind</title>
	<link rel="icon" sizes="192x192" href="img/touch-icon.png" /> 
	<link rel="apple-touch-icon" href="img/touch-icon-iphone.png" /> 
	<link rel="apple-touch-icon" sizes="76x76" href="img/touch-icon-ipad.png" /> 
	<link rel="apple-touch-icon" sizes="120x120" href="img/touch-icon-iphone-retina.png" />
	<link rel="apple-touch-icon" sizes="152x152" href="img/touch-icon-ipad-retina.png" />
	<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico" />

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/main.min.css">
	<link rel="stylesheet" type="text/css" href="css/collective.css">
</head>
<body>
	<div id="loading">
		<div class="loader loader-light loader-large"></div>
	</div>

	<? include_once("modules/header.php"); ?>

	<div class="wrapper">

		<? include_once("modules/aside.php"); ?>
		
		<section class="content">
			<header class="main-header">
				<div class="main-header__nav">
					<h1 class="main-header__title">
						<i class="pe-7f-home"></i>
						<span><?=ucfirst($mode)?></span>
					</h1>
				</div>
			</header> <!-- /main-header -->
            
            <div class="row">
<?
switch ($mode) {
    case "home":
        include_once("modules/comments.php");
	include_once("modules/users.php");
        break;
    
    case "configuration":
        include_once("modules/configuration.php");
        break;
    
    case "profile":
        include_once("modules/profile.php");
        break;
    
    case "messages":
        include_once("modules/messages.php");
        break;
}    
?>					
				</div> <!-- /row -->
            
			<footer class="footer-brand">
				<img src="img/logo_trim.png">
				<p>2014 Collective mind</p>
			</footer>


		</section> <!-- /content -->

	</div>
	<script type="text/javascript" src="js/ajax.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
	<script type="text/javascript" src="js/amcharts/amcharts.js"></script>
	<script type="text/javascript" src="js/amcharts/serial.js"></script>
	<script type="text/javascript" src="js/amcharts/pie.js"></script>
	<script type="text/javascript" src="js/chart.js"></script>
</body>
</html>
