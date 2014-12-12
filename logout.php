<?php
require_once('includes/conn.php');
mysqli_query($link,'UPDATE usuarios SET  conectado = 0 WHERE id ='.$_SESSION['id']);
session_unset();
session_destroy();
header ("Location: ciao");
die;
?>
