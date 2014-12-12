<? require_once("login.php");if(!$loginCorrecto){ header("Location: index.php?log_error=2"); } ?>
<link rel="stylesheet" href="/2.0/includes/chosen/chosen.css" />
<script src="/2.0/includes/chosen/chosen.jquery.js" type="text/javascript"></script>
<script type="text/javascript">
	function muestraLinks(id){
		$('#links').load('_mostrar_links.php?id='+id);
	};
</script>
<div id="categorias">
	<div class="relativo">
		<div id="buscaTags">
			<select data-placeholder="Busca por tags" style="width:500px;" id="tag-select" tabindex="8" onchange="javascript:muestraLinks($(this).val())">
<?
	$tagsSql = 'SELECT tags.id as idTag, tags.nombre as nombreTag, tags.hits as hitTags, count(tags_links.id) as numLinks FROM tags INNER JOIN tags_links ON tags.id = tags_links.id_tag GROUP BY nombre ORDER BY numLinks DESC LIMIT 150';
	$tags = mysql_query($tagsSql);
	while($rcsTags = mysql_fetch_array($tags)){
?>
					<option value="<?=$rcsTags['idTag']?>"><?=$rcsTags['nombreTag']?></option>
<?
	}
	mysql_data_seek($tags,0);
?>
			</select>
		</div>
		<div id="links"></div>
		<div id="+categorias"></div>
    	<div class="clear"></div>
	</div>
</div>