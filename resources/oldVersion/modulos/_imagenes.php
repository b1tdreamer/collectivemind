<? require_once("login.php");if(!$loginCorrecto){ header("Location: index.php?log_error=2"); } ?>
<div id="divObras" class="Item">
	<h2><a href="artistas.php" class="titulo" title="Ver todas las obras subidas" rel="facebox">
	Artistas del<br/>escaqueo
	</a></h2>
    <div class="subItem">
		<div id="divImg">
<?
	$obrasSql = 'SELECT * FROM obras INNER JOIN usuarios on obras.autor = usuarios.id order by fecha DESC LIMIT 15';
    $obras = mysql_query($obrasSql);
    while($rcsObra = mysql_fetch_array($obras)){
?>
		<a href="<?=$rcsObra["img"]?>" rel="facebox">
		  <img src="_thumb.php?src=<?=$rcsObra["img"]?>&w=250&h=200" alt="<?=$rcsObra["nombre"]?>
		  - <?=$rcsObra["autor"]?>" width="250" height="200"/>
        </a>
<?
	}
?>
		</div>
	</div>
    <span id="showMasObras" class="clickable">
		<img src="img/mas.png" name="imgMasNoticias" width="32" height="32"/>
	</span>
    <div id="divMasObras" class="divMas">
    	<form action="_inserciones.php" method="post" enctype="multipart/form-data" >
		  <input type="text" name="nombreObra" value="Introduce un nombre" onFocus="Borrar(this)"
		  title="para que nos entendamos"/>
		  <input type="file" name="obra" style="width:140px;margin-bottom:4px"/>
		  <input type="image" src="img/leaf1.png"/>
        </form>
    </div>
</div>