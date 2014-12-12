<? require_once("login.php");if(!$loginCorrecto){ header("Location: index.php?log_error=2"); }?>
<div id="divMensajes">
<?
	$mensajesSql = 'SELECT * FROM mensajes WHERE receptor='.intval($_SESSION["id"]).' AND visto=0 AND visible=1 order by fecha';
	$mensajes = @mysql_query($mensajesSql);
	$num_sms = @mysql_num_rows($mensajes);
	if($num_sms == 0)
	{
?>
		<a href='mensajes.php' title='Leer mensajes' rel='facebox'>
			<img src='img/smsV.png' width='50' height='50' title='No tienes mensajes nuevos'/>
		</a>
<?		
	}else{
?>
		<a href='mensajes.php' title='Leer mensajes' rel='facebox'>
			<img src='img/smsR.png' width='50' height='50'/><?=$num_sms?>
		</a>
<?
	}
?>
</div>
