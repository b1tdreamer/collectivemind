<? require_once("login.php");if(!$loginCorrecto){ header("Location: index.php?log_error=2"); }?>
<div id="divAudios" class="Item">
	<span class="titulo"><h2>Audios</h2></span>
    <div class="subItem">
<?
	// Audios
    $audiosSql = 'SELECT * FROM audios order by id';
    $audios = mysql_query($audiosSql);
	while($rcsAudio=mysql_fetch_array($audios)){
?>
		<a class="juego" href="<?=$rcsAudio["link"]?>" target="_blank"><?=$rcsAudio["nombre"]?></a>
<?
	</div>
	<div id="divMasAudios" class="divMas">
		<form action="_inserciones.php" method="post" enctype="multipart/form-data">
			<input type="text" name="a" value="Escribe el titulo del audio" onFocus="Borrar(this)"/><br/>
            <input type="text" name="l" value="Link" onFocus="Borrar(this)"/><br/>
            <!--input type="file" name="snap" style="width:140px;margin-bottom:4px"/--><br/>
            <input type="image" src="img/leaf1.png"/>
        </form>
    </div>
	<span id="showMasAudios" class="clickable">
		<img src="img/mas.png" name="imgMasAudios" width="32" height="32"/>
	</span>
</div>