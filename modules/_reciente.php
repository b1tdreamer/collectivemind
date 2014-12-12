<? require_once("login.php");if(!$loginCorrecto){ header("Location: index.php?log_error=2"); }?>
<div id="divReciente" class="Item">
	<span class="titulo"><h2>Actividad<br/>reciente</h2></span>
    <div class="subItem" id="subReciente">
<?
	$recienteSql = 'SELECT * FROM links INNER JOIN usuarios ON links.autor = usuarios.id order by links.id desc LIMIT 8';
	$reciente = mysql_query($recienteSql);
	while($rcsReciente = mysql_fetch_array($reciente)){
?>
		<span class="reciente">
		  <span class="usuario"><?=htmlentities($rcsReciente["usuario"])?>: </span> subi&oacute; el link 
		  <a href="<?=htmlentities($rcsReciente["direccion"])?>" title="<?=htmlentities($rcsReciente["tags"])?>" target="_blank"><?=htmlentities($rcsReciente["nombre"])?></a>
		</span>
<?
	}
	$recienteSql = 'SELECT * FROM videos INNER JOIN usuarios ON videos.autor = usuarios.id order by videos.id desc LIMIT 4';
	$reciente = mysql_query($recienteSql);
	while($rcsReciente=mysql_fetch_array($reciente)){
?>
		<span class="reciente"><span class="usuario">
		<?=htmlentities($rcsReciente["usuario"])?>: </span> subi&oacute; el video 
		<a href="_youtube.php?codigo=<?=htmlentities($rcsReciente["link"])?>" rel="facebox">
		<?=htmlentities($rcsReciente["nombre"])?>
		</a></span>
<?
	}
	$recienteSql = 'SELECT * FROM obras INNER JOIN usuarios ON obras.autor = usuarios.id order by obras.id desc LIMIT 4';
	$reciente = mysql_query($recienteSql);
	while($rcsReciente = mysql_fetch_array($reciente))
	{
?>
		<span class="reciente"><span class="usuario"><?=htmlentities($rcsReciente["usuario"])?>: </span>
		subi&oacute; obra <a href="<?=htmlentities($rcsReciente["img"])?>" title="<?=htmlentities($rcsReciente["nombre"])?>" rel="facebox">
		<?=htmlentities($rcsReciente["nombre"])?></a></span>
<?
}
?>
	</div>
</div>