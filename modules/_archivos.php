<? require_once("login.php");if(!$loginCorrecto){ header("Location: index.php?log_error=2"); }?>
<div id="divArchivos" class="Item">
	<span class="titulo"><h2>Achivos</h2></span>
    <div class="subItem">
    	<div id="divListaArchivos">
<?
	// Archivos
	$ArchSql = 'SELECT * FROM archivos ORDER BY fecha desc LIMIT 12';
    $archivos = mysql_query($ArchSql);
    while($rcsArch=mysql_fetch_array($archivos)){
?>
			<a href="<?=$rcsArch["url"]?>" target="_blank" class="archivos">
            	<?=$rcsArch["nombre"]?>
            </a>
<?
	}
?>
        </div>
	</div>
    <span id="showMasArchivos" class="clickable">
		<img src="img/mas.png" name="imgMasNoticias" width="32" height="32"/>
	</span>
	<div id="divMasArchivos" class="divMas">
	  <form action="_inserciones.php" method="post" enctype="multipart/form-data" >
		<input type="text" name="nombreArch" value="Introduce un nombre" onFocus="Borrar(this)" 
		title="para que nos entendamos"/><br/>
		<input type="file" name="arch" style="width:140px;margin-bottom:4px"/><br/>
		<input type="image" src="img/leaf1.png"/>
	  </form>
	</div>
</div>