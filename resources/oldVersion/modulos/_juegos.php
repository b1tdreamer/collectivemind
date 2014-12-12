<? require_once("login.php");if(!$loginCorrecto){ header("Location: index.php?log_error=2"); } ?>
<div id="divJuegos" class="Item">
	<span class="titulo"><h2>Juegos</h2></span>
	<div class="subItem" id="subReciente">
    	<ul id="divLista" style="list-style: none;padding-left:5px">
<?
	$juegosSql = 'SELECT * FROM juegos';
    $juegos = mysql_query($juegosSql);
    while($rcsJuego = mysql_fetch_array($juegos)){
?>
			<li>
				<a id="<?=$rcsJuego["url"]?>" class="juego"><?=$rcsJuego["nombre"]?></a>
				<div class="snapshot"><img width="200" height="122" src="<?=$rcsJuego["img"]?>"></div>
			</li>
<?
	}
?>
		</ul>
        <div id="divJuego"></div>
        <div id="divMasJuegos" class="divMas">
			<form action="_inserciones.php" method="post" enctype="multipart/form-data">
				<input type="text" name="j" value="Escribe el titulo del juegos" onFocus="Borrar(this)"
				title="el juego que quieras subir"/><br/>
				<input type="text" name="l" value="Link" onFocus="Borrar(this)"/><br/>
				<!--input type="file" name="snap" style="width:140px;margin-bottom:4px"/--><br/>
				<input type="image" src="img/leaf1.png"/>
		  	</form>
		</div>
        <span id="showMasJuegos" class="clickable" style="margin-top:-2px;">
        	<img src="img/mas.png" name="imgMasVideos" width="32" height="32"/>
        </span>
	</div>
</div>
