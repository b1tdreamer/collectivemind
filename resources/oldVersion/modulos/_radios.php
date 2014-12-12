<? require_once("login.php");if(!$loginCorrecto){ header("Location: index.php?log_error=2"); }?>
<div id="divMusica" class="Item">
	<span class="titulo"><h2>Radios</h2></span>
	<div class="subItem">
<?
	// Radios
	$radiosSql = 'SELECT * FROM radios order by id';
	$radios = mysql_query($radiosSql);
	while($rcsRadio=mysql_fetch_array($radios)){
?>
		<a onclick='var so = new SWFObject("radioPlayer/nativeradio2big.swf", "nativeradio", "398", "130", "10", "#cccccc");so.addParam("scale", "noscale");so.addVariable("swfcolor", "8878a8");so.addVariable("swfstreamurl","<?=$rcsRadio["url"]?>");so.addVariable("swfpause", "0");so.addParam("wmode", "transparent");so.write("divReproductorRadio");'><?=$rcsRadio["nombre"]?></a>
<?
	}
?>
		<a href="http://www.rtve.es/radio/radio3/" title="Escuchar Radio3" target="_blank">Radio 3</a>
	</div>
</div>
