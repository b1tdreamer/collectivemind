<? require_once("login.php");if(!$loginCorrecto){ header("Location: index.php?log_error=2"); }?>
<div id="divOnline">
	<h2 class="floatL" style="margin-left: 20px">Usuarios</h2>
	<div id="divUsuarios">
<?
	$usuariosSql = 'SELECT * FROM usuarios order by conectado, fecha desc';
	$usuarios = mysql_query($usuariosSql);
	while($rcsUsuario=mysql_fetch_array($usuarios))
	{
        if($rcsUsuario["conectado"]!=1)
        {
            $offline.= '<span class="spnOnline"><img src="img/offline.png" width="16" height="16" valign="middle" alt="est&aacute; offline" />';
            $offline.= ' <a rel="facebox" href="mensajes.php?id='.$rcsUsuario["id"].'" title="Env&iacute;ale un mensaje" style="display:inline"><span class="usuario">'.$rcsUsuario["usuario"].'</span></a></span><br/>';
        }else{
            $line.= '<span class="spnOnline"><img src="img/online.png" width="16" height="16" valign="middle" alt="est&aacute; online" />';
            $line.= ' <a rel="facebox" href="mensajes.php?id='.$rcsUsuario["id"].'" title="Env&iacute;ale un mensaje" style="display:inline"><span class="usuario">'.$rcsUsuario["usuario"].'</span></a></span><br/>';
        }  
}

echo $line;
//echo "<spn id='spnDesconectados' class='spnOnline usuario'><img src='img/offline.png' width='16' height='16' valign='middle' alt='est&aacute; offline' />desconectados</div>";
echo $offline;
?>
	</div>
</div>