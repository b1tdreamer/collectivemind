<?
require_once('includes/conn.php');
$tags = mysql_query('SELECT id, tags FROM links');
while($rcsTag = mysql_fetch_array($tags)){
	$idLink = $rcsTag['id'];
	$arrayTags = explode(',', trim($rcsTag['tags']));
	$i = 0;
	while($arrayTags[$i]){
		$SQL = 'SELECT id, nombre FROM tags WHERE nombre LIKE "'. trim($arrayTags[$i]) .'"';
		$existe = mysql_query($SQL);
		if((mysql_num_rows($existe)) > 0){
			$idTag = mysql_result($existe, 0, 'id');
		}else{
			$SQL2 = 'INSERT INTO tags (nombre) VALUES ("'.trim($arrayTags[$i]).'")';
			mysql_query($SQL2);
			$idTag = mysql_insert_id($link);
		}
		$SQL3 = 'INSERT INTO tags_links (id_tag, id_link) VALUES ("'. $idTag .'","'. $idLink .'")';
		mysql_query($SQL3);
		$i++;
	}
}
?>