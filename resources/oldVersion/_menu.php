<span><a href="/2.0/"><img src="/2.0/img/brain.png" height="45"/></a></span>
<div class="floatR">
<?
if($_SESSION["id"]=1) { //Muestra mas opciones si eres admin
?>
	<span><a href="http://www.collectivemind.es:2082/3rdparty/phpMyAdmin/index.php" target="_blank"><img src="/img/usrs.png" width="30" height="30" alt="Bd" /></a></span>
<? }?>
	<span><a href="logout.php"><button>Salir</button></a></span>
</div>
<div class="clear"></div> 