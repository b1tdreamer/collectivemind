<? require_once("login.php");if(!$loginCorrecto){ header("Location: index.php?log_error=2"); }
if($_SESSION["usr"]=='kzyon' || $_SESSION["usr"]=='bajoFondo'){
?>
	<div id="divDesarrollo" class="Item">
		<h2>Desarrollo</h2>
		<div id="accesoFTP">
			<small>Datos FTP<br/>it@collectivemind.es<br/>d3s4rr0ll0<br/></small>
		</div>
   	    <div class="subItem" id="sID">
<?
	// Buzon de desarrollo
    $desarrolloSql = 'SELECT * FROM desarrollo WHERE visible = 1 order by prioridad desc LIMIT 8';
    $desarrollo=mysql_query($desarrolloSql);
	while($rcsDesarrollo=mysql_fetch_array($desarrollo)){
?>
			<div class="desarrollo">
				- <?=$rcsDesarrollo["comentario"]?>
				<form method="post" action="_inserciones.php">
					<input style="float:right;margin:-12px -19px 0px 0px;" type="image" src="img/cerrar.png" name="eliminarD" value="<?=$rcsDesarrollo["id"]?>"/>
				</form>
			</div>
<?
	}
?>
		<div id="masDesarrollo">
        	<form method="post" action="_inserciones.php">
            	<input type="text" name="d" value="Trabajo por hacer ; prioridad" onFocus="Borrar(this)"/>
            </form>
        </div>
	</div>
</div>
<?
	}
?>