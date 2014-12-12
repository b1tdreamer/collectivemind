<?php
session_start();
require_once("functions.php");
$link = mysqli_connect("localhost", "******", "******");
/* comprueba la conexión */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
mysqli_select_db($link,"jmivswnm_mindLite");
?>
