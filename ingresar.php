<?php
require_once ("includes/conn.php");
if(trim($_POST['user']) != '' && trim($_POST['password']) != '') {
	$nickN = mysqli_real_escape_string($link,trim($_POST['user']));
	$passN = hash('sha256', $_POST["password"]);
	$sql = 'SELECT * FROM users WHERE user=\'' . $nickN . '\' and  password=\'' . $passN . '\'';
	//echo $sql;exit;	
	$result = mysqli_query($link,$sql);
	if ($row = mysqli_fetch_array($result)) {
		$_SESSION['usr']=$row["user"];
		$_SESSION['id']=$row["id"];
		$_SESSION['pss']=$row["password"];
		$sqlConn="UPDATE users SET conectado='1', ip='".$_SERVER['REMOTE_ADDR']."' WHERE id='".$row["id"]."'";
		$conectado = mysqli_query($link,$sqlConn);
		header("Location: home");
		exit;
	} else {
		header('Location: index.php?log_error=1');
		exit;
	}
	mysqli_free_result($result);
} else {
	header('Location: index.php?log_error=2');
	exit;
}
mysqli_close();
?>
