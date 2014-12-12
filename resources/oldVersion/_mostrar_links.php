<?
require_once ("includes/funciones.php");
require_once("login.php");
if(!$loginCorrecto){ header("Location: index.php?log_error=2"); }
if($_GET['id']){
	$id = intval($_GET['id']);
}
$sql = 'SELECT
	tags.nombre AS nombreTag,
	links.titulo AS nombreLink,
	links.link AS enlaceLink
	FROM tags 
	INNER JOIN tags_links ON tags.id = tags_links.id_tag
	INNER JOIN links ON tags_links.id_link = links.id 
	WHERE tags.id = ' . $id;
$links = mysql_query($sql);
while($rcsLink = mysql_fetch_array($links)){
?>
		<a href="<?=$rcsLink['enlaceLink']?>" title="Ir a <?=$rcsLink['nombreLink']?>" target="_blank"><?=$rcsLink['nombreLink']?></a>
<?
}
?>