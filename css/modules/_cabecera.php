<div id="divCabecera">
	<div id="divExit">
    	<img src="img/exit.png" width="30" height="30" alt="Exit" name="exit" onmouseover="document.exit.src='img/exit2.png'" onMouseOut="document.exit.src='img/exit.png'" onClick="document.location.href='logout.php'"/><br/>
<?
	//Muestra mas opciones si eres admin
	if($_SESSION["usr"]=='kzyon') 
    {
?>
		<a href="http://www.collectivemind.es:2082/3rdparty/phpMyAdmin/index.php" target="_blank">
			<img src="img/usrs.png" width="30" height="30" alt="Bd" />
		</a>
<?
	}
?>
    </div>
</div>