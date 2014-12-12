<?php
$loginCorrecto = false;
require_once('includes/conn.php');
if(isset($_SESSION['id']) && isset($_SESSION['pss'])){
		$result = mysqli_query($link,"SELECT * FROM users WHERE id='".intval($_SESSION['id'])."' AND password='".$_SESSION['pss']."'");
		if ($row = mysqli_fetch_array($result)) {
			$_SESSION['usr']=$row["user"];
			$_SESSION['id']=$row["id"];
			$_SESSION['pss']=$row["password"];
			$loginCorrecto = true;
		} else {
			//session_destroy();
		}
	   mysqli_free_result($result);
}
/*else{
	header('Location: index.php');
}*/
?>
