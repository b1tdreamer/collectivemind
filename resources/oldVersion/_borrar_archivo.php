<?
require_once("login.php");if(!$loginCorrecto){ header("Location: index.php?log_error=2"); }
require_once ("includes/funciones.php");

$tabla = mysql_real_escape_string($_GET['tabla']);
$id = intval($_GET['id']);
$campos = mysql_real_escape_string($_GET['campos']);
if ($id != 0) {
	// Busca y elimina los documentos anexos
	$sql = "SELECT id, " . $campos . " FROM ".$tabla." WHERE id=" . $id;
	$r_datos = mysql_query($sql, $link);
	//Recorre la matriz de campos
	$campos = explode(',', $campos);
	foreach ($campos as $clave => $valor) {
		$archivo = mysql_result($r_datos, 0, $valor);
		if ($archivo != '') {
			chmod('../' . $archivo, 0666);
			unlink('../' . $archivo);
		}
		$sql = "UPDATE " . $tabla . " SET " . $valor . " = '' WHERE id = " . $id;
		mysql_query($sql);
	}
}
?>