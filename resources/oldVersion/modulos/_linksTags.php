<? require_once("login.php");if(!$loginCorrecto){ header("Location: index.php?log_error=2"); } ?>
<div id="categorias" class="Item">
		<div id="buscaTags">
			<select data-placeholder="Busca por tags" style="width:350px;" multiple id="tag-select" tabindex="8">
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
		<canvas width="600" height="460" id="tags">
  			<ul>
<?
		// Tags
		
		while($rcsTags = mysql_fetch_array($tags)){
?>
		<li><a href="javascript:alert(<?=$rcsTags['idTag']?>);" title="Ver enlaces relaccionado con <?=$rcsTags['nombreTag']?>" class="tag"><?=$rcsTags['nombreTag']?></a></li>
<?
		}
?>  		</ul>
			<p>Anything in here will be replaced on browsers that support the canvas element</p>
		</canvas>
		<div id="+categorias"></div>
		<div class="clear"></div>
</div>