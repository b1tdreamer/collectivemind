<? require_once("login.php");if(!$loginCorrecto){ header("Location: index.php?log_error=2"); } ?>
<div id="divNoticias" class="Item">
	<h2 style="font-size:12px;text-align:left;margin:3px 0px 10px 5px">&Uacute;ltimas Noticias :</h2>
	<span id="showMasNoticias" class="clickable">
		<img src="img/mas.png" name="imgMasNoticias" width="32" height="32"/>
  	</span>
<?
        //Noticias
		$noticiasSql = 'SELECT * FROM noticias INNER JOIN usuarios ON noticias.autor=usuarios.id order by noticias.id desc LIMIT 5';
        $noticias = mysql_query($noticiasSql);
		if($rcsNoticias["fecha"] != '0000-00-00 00:00:00')
		{
			$fecha=$rcsNoticias["fecha"];
		}
		$i = 1;
        while($rcsNoticias = mysql_fetch_array($noticias))
        {
?>
		<div class="noticia" id="noticia<?=$i?>" style="margin-top:-16px"><?=$rcsNoticias["noticia"]?>
<?
		if($rcsNoticias["link"]){
?>
			<a href="<?=$rcsNoticias["link"]?>" title="Ver link" target="_blank" style="display:inline"/>link</a>
<?
		}
?>
			<span class="fecha"><?=$rcsNoticias["fecha"]?></span>
		</div>
<?
		$i++;
        }
?>
  <div id="divMasNoticias" class="divMas">
	<form action="_inserciones.php" method="post">
	  <input type="text" name="n" value="Escribe tu exclusiva ; )" onFocus="Borrar(this)"
	  title="la noticia de la que quieres avisar"/><br/>
	  <input type="text" name="l" value="Link" onFocus="Borrar(this)"/><br/>
	  <input type="image" src="img/leaf1.png"/>
	</form>
  </div>
</div>