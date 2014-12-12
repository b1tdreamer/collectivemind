<?
require_once("login.php");if(!$loginCorrecto){ header("Location: index.php?log_error=2"); }
require_once ("includes/conn.php");
$tabla = mysqli_real_escape_string($link,$_GET['tabla']);
$id = intval($_GET['id']);
$campos = mysqli_real_escape_string($link,$_GET['campos']);
if ($id != 0) {
	// Busca y elimina los documentos anexos
	$sql = 'SELECT id, ' . $campos . ' FROM '.$tabla . ' WHERE id=' . $id;
	$r_datos = mysqli_query($link,$sql);
	//Recorre la matriz de campos
	$campos = explode(',', $campos);
	foreach ($campos as $clave => $valor) {
		$archivo = mysqli_result($r_datos, 0, $valor);
		if ($archivo != '') {
			chmod('../'.$archivo, 0666);
			unlink('../'.$archivo);
		}
	}
	$sql = 'DELETE from ' . $tabla . ' WHERE id=' . $id;
	mysqli_query($link,$sql);
}
?>