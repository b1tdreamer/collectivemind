<? require_once("login.php");if(!$loginCorrecto){ header("Location: index.php?log_error=2"); }?>
<div id="divPelis" class="Item">
	<span class="titulo"><h2>Pel&iacute;culas</h2></span>
	<div class="subItem">
	<div id="divListaPelis">
<?
	$PeliSql= 'SELECT * FROM pelis LIMIT 10';
	$peliculas = mysql_query($PeliSql);
	while($rcsPeli = mysql_fetch_array($peliculas)){
?>
	  <a href="<?=$rcsPeli["link"]?>" target="_blank" class="archivos" title="<?=$rcsPeli["texto"]?>">
	  	<?=$rcsPeli["nombre"]?>
	  </a>
<?
	}
?>
	</div>
	<div id="divMasPelis" class="divMas">
	  <form action="_inserciones.php" method="post">
		<input type="text" name="p" value="Escribe el titulo" onFocus="Borrar(this)"
		title="La peli que quieras compartir"/><br/>
		<input type="text" name="resumen" value="Breve resumen de la peli" onFocus="Borrar(this)"
		title="Resumen de la pelicula"/><br/>
		<input type="text" name="l" value="Link" onFocus="Borrar(this)"/><br/>
		<!--input type="file" name="snap" style="width:140px;margin-bottom:4px"/--><br/>
		<input type="image" src="img/leaf1.png"/>
	  </form>
	</div>
	<span id="showMasPelis" class="clickable" style="margin-top:-2px;">
	  <img src="img/mas.png" name="imgMasPelis" width="32" height="32"/>
	</span>
  </div>
</div>