<?
require_once("conn.php");

function sacarLinks($id){

	echo $sql = '
		SELECT
		tags.nombre AS nombreTag,
		links.titulo AS nombreLink,
		links.link AS enlaceLink
		FROM tags 
		INNER JOIN tags_links ON tags.id = tags_links.id_tag
		INNER JOIN links ON tags_links.id_link = links.id 
		WHERE tags.id = ' . $id;
	$links = mysql_query($sql);
	/*while($rcsLink = mysql_fetch_array($links)){
?>
		<a href="<?=$rcsLink['enlaceLink']?>" title="Ir a <?=$rcsLink['nombreLink']?>" target="_blank"><?=$rcsLink['nombreLink']?></a>
<?
	}*/
	return $sql;
}

function url($id,$titulo,$opc){

$titulo = simplificar($titulo);
$url = $titulo."-".$opc."-".$id;

return $url;

}

function url_categoria($id,$titulo){

$titulo = simplificar($titulo);

$url = "cat-".$id."-".$titulo;

return $url;

}

function url_producto($id,$titulo){

$titulo = simplificar($titulo);

$url = "p-".$id."-".$titulo;

return $url;

}

function url_proyecto($id,$titulo){

$titulo = simplificar($titulo);

$url = "proy-".$id."-".$titulo;

return $url;

}

function url_noticia($id,$titulo){

$titulo = simplificar($titulo);

$url = "n-".$id."-".$titulo;

return $url;


}

function simplificar ($url){

	$url = strtolower($url);
	$url = trim($url);
	$url = str_replace("�","n",$url);
	$url = str_replace("�","a",$url);
	$url = str_replace("�","e",$url);
	$url = str_replace("�","i",$url);
	$url = str_replace("�","o",$url);
	$url = str_replace("�","a",$url);
	$url = str_replace(" : ","-",$url);
	$url = str_replace(": ","-",$url);
	$url = str_replace(" :","-",$url);
	$url = str_replace(":","-",$url);
	$url = str_replace("%","",$url);
	$url = str_replace(" ","-",$url);
	$url = str_replace("\"","",$url);
	$url = str_replace("\\","",$url);
	$url = str_replace("'","",$url);
	$url = str_replace("/","",$url);
	if(substr($url,-1)=="-")
		$url = substr($url,0,-1);
	
	return $url;

}

function mes($mes){

	switch($mes){
	
	case 01: case 1:
		return "Enero";
		break;
	
	case 02: case 2:
		return "Febrero";
		break;
	
	case 03: case 3:
		return "Marzo";
		break;
	
	case 04: case 4:
		return "Abril";
		break;
	
	case 05: case 5:
		return "Mayo";
		break;
	
	case 06: case 6:
		return "Junio";
		break;
	
	case 07: case 7:
		return "Julio";
		break;
	
	case 08: case 8:
		return "Agosto";
		break;
	
	case 09: case 9:
		return "Septiembre";
		break;
	
	case 10:
		return "Octubre";
		break;
	
	case 11:
		return "Noviembre";
		break;
	
	case 12:
		return "Diciembre";
		break;
	}
}


function ordenar_array() { 
  $n_parametros = func_num_args(); // Obenemos el n�mero de par�metros 
  if ($n_parametros<3 || $n_parametros%2!=1) { // Si tenemos el n�mero de parametro mal... 
    return false; 
  } else { // Hasta aqu� todo correcto...veamos si los par�metros tienen lo que debe ser... 
    $arg_list = func_get_args(); 

    if (!(is_array($arg_list[0]) && is_array(current($arg_list[0])))) { 
      return false; // Si el primero no es un array...MALO! 
    } 
    for ($i = 1; $i<$n_parametros; $i++) { // Miramos que el resto de par�metros tb est�n bien... 
      if ($i%2!=0) {// Par�metro impar...tiene que ser un campo del array... 
        if (!array_key_exists($arg_list[$i], current($arg_list[0]))) { 
          return false; 
        } 
      } else { // Par, no falla...si no es SORT_ASC o SORT_DESC...a la calle! 
        if ($arg_list[$i]!=SORT_ASC && $arg_list[$i]!=SORT_DESC) { 
          return false; 
        } 
      } 
    } 
    $array_salida = $arg_list[0]; 

    // Una vez los par�metros se que est�n bien, proceder� a ordenar... 
    $a_evaluar = "foreach (\$array_salida as \$fila){\n"; 
    for ($i=1; $i<$n_parametros; $i+=2) { // Ahora por cada columna... 
      $a_evaluar .= "  \$campo{$i}[] = \$fila['$arg_list[$i]'];\n"; 
    } 
    $a_evaluar .= "}\n"; 
    $a_evaluar .= "array_multisort(\n"; 
    for ($i=1; $i<$n_parametros; $i+=2) { // Ahora por cada elemento... 
      $a_evaluar .= "  \$campo{$i}, SORT_REGULAR, \$arg_list[".($i+1)."],\n"; 
    } 
    $a_evaluar .= "  \$array_salida);"; 
    // La verdad es que es m�s complicado de lo que cre�a en principio... :) 

    eval($a_evaluar); 
    return $array_salida; 
  } 
} 
function tallas($tallas,$id){

$tallas = explode(";",$tallas);

echo "<select name='talla".$id."' id='talla".$id."' class='textos'>";
foreach($tallas as $tt){
	$t = trim($tt);
	echo "<option value='".$t."'>".$t."</option>";

}
echo "</select>";
}
function sacar_respuestas($id){

$sql="select count(*) from encuestas_votos where idpregunta='".$id."'";

$r = mysql_query($sql);

return mysql_result($r,0);



}

function sacar_categorias_padres($padre,$seleccionado,$seccion){

	$sql = "select * from ".$seccion." where idpadre=".$padre." order by orden";
	
	$r = mysql_query($sql);
	while ($d = mysql_fetch_array($r)){
			
			$nombre = $d['nombre'];
		
			if ($seleccionado==$d['id'])
				echo "<option value='".$d['id']."' selected>".$nombre."</option>";
			else
				echo "<option value='".$d['id']."'>".$nombre."</option>";
		
		
	}
	
}

function sacar_cat($seleccionado,$seccion){

	$sql = "select * from ".$seccion." order by id desc";
	
	$r = mysql_query($sql);
	while ($d = mysql_fetch_array($r)){
			
			$nombre = $d['titulo'];
		
			if ($seleccionado==$d['id'])
				echo "<option value='".$d['id']."' selected>".$nombre."</option>";
			else
				echo "<option value='".$d['id']."'>".$nombre."</option>";
		
		
	}
	
}




function url_opinion($titulo,$id){



$titulo = strtolower($titulo);

$titulo = normalizar($titulo);

$url = "opinion-".$id."-".urlencode($titulo);

$arr = explode("+",$url);

$url = $arr[0]."-".$arr[1]."-".$arr[2]."-".$arr[3]."-".$arr[4].".php";



return $url;



}



function normalizar($texto){



	$texto = strtolower($texto);

	$texto = htmlentities($texto);

	$texto = str_replace("/","",$texto);

	$texto = str_replace(",","",$texto);

	$texto = str_replace("&ntilde;","n",$texto);

	$texto = str_replace("&Ntilde;","N",$texto);

	$texto = str_replace("&aacute;","a",$texto);

	$texto = str_replace("&Aacute;","A",$texto);

	$texto = str_replace("&eacute;","e",$texto);

	$texto = str_replace("&Eacute;","E",$texto);

	$texto = str_replace("&iacute;","i",$texto);

	$texto = str_replace("&Iacute;","I",$texto);

	$texto = str_replace("&oacute;","o",$texto);

	$texto = str_replace("&Oacute;","O",$texto);

	$texto = str_replace("&uacute;","u",$texto);

	$texto = str_replace("&Uacute;","U",$texto);



	return $texto;



}






function limpiar($texto){



$texto = htmlentities($texto);

$texto = addslashes($texto);

return $texto;



}

function borrar($tabla,$id,$fotos=0){



	if ($fotos==1){

		$r_fotos = mysql_query("select foto from ".$tabla." where id=".$id);	

		$foto = mysql_result($r_fotos,0);

		unlink("../".$foto);	

	}



$sql = "delete from ".$tabla." where id=".$id;

mysql_query($sql, $link);

}



function crear_imagen($foto,$nombre,$w,$h,$restrictivo=0,$num,$path="../"){

	if($foto !=""){

	

		$time = time();

	

		$strs = explode(".",$nombre);

		$count= count($strs);

		$extension = ".".$strs[$count-1];
		
		$extension = strtolower($extension);				

		$fotonombre = "fotos/".$time.$num.$extension;

		redimensionar_jpeg($foto,$path.$fotonombre,$w,$h,$restrictivo,100);	

		@chmod($path.$fotonombre,0777);

		return $fotonombre;

	}

}





function crear_archivo($archivo,$nombre){

	if($nombre!=""){

		

		$fecha = time();

		

		$strs = explode(".",$nombre);

		$count= count($strs);

		$extension = ".".$strs[$count-1];

		$extension = strtolower($extension);

		

		$fichero = "archivos/".$fecha.$extension;

		@copy($archivo,"../".$fichero);

		@chmod("../".$fichero,0777);

		

		return $fichero;

		

	}

}



function email_cliente($pedido){


	$title = "Pedido desde la web luciled.com";
	  
	$cabeceras = "From: luciled.com <info@luciled.com>\r\nContent-type: text/html\r\n";
	  	  
	if ($pedido!=0)
		$sql = "select * from pedidos where id='".$pedido."'";
	else
		$sql = "select * from pedidos order by id desc limit 1";
		
	$r_pedido = mysql_query($sql);
	
	$datos = mysql_fetch_array($r_pedido);
	
	$id = $datos['id'];
	$fecha = $datos['fecha'];

	$email = $datos['email'];
	
	$gastos = $datos['envio'];
		
	$sql = "select * from productos_pedido where idpedido=".$id;
	
	$r_productos = mysql_query($sql);

		
	$cuerpo = "<font color='#444444' size='2' face='Arial, Helvetica, sans-serif'>Hola ".$datos['nombre'].": <br />
				En primer lugar, gracias por confiar en luciled.com.<br />
				Su c&oacute;digo de pedido es:".encriptar($id)." 
				<br /><br />
				";
		  
		  /*if($datos['pagado']=="Transferencia bancaria"){
		  
		  $cuerpo.="Recuerde que tiene que realizar una transferencia bancaria al siguiente n� de cuenta: <br />
				0128 1507 37 0500000734<br />
				indicando el n� de pedido, y enviarnos el justificante de la transferencia por email a web@luciled.com<br />";
		  
		  }*/
		  
		  $cuerpo.='</font><table border="0"></tr><td><table width="600" border="0" align="left" cellpadding="5" cellspacing="2">
                      <tr>
                      <th width="58%" align="left" valign="middle" style="font-family: Tahoma, Arial; font-size: 11px;color: #333333;">PRODUCTO</th>
                      <th width="14%" align="center" valign="middle" style="font-family: Tahoma, Arial; font-size: 11px;color: #333333;">PRECIO</th>
                      <th width="14%" align="center" valign="middle" style="font-family: Tahoma, Arial; font-size: 11px;color: #333333;">CANTIDAD</th>
                      <th width="14%" align="center" valign="middle" style="font-family: Tahoma, Arial; font-size: 11px;color: #333333;">TOTAL</th>
                      </tr>';
		
		while($d_prod = mysql_fetch_array($r_productos)){
		
		$cantidad = $d_prod['cantidad'];
		$titulo = $d_prod['titulo'];
		$precio = $d_prod['precio'];
		
		$total_articulos+= $cantidad;		
		$total_precio+= ($precio*$cantidad);
		
		 $cuerpo.= "<tr>
                      <td valign='middle' style='font-family: Tahoma, Arial; font-size: 11px;color: #333333;background-color:#eeeeee;''>".$titulo."</td>
					  <td valign='middle' align='right' style='font-family: Tahoma, Arial; font-size: 11px;color: #333333;background-color:#eeeeee;'>".pasar_euros($precio)." &euro;</td>
					  <td align='center' valign='middle' style='font-family: Tahoma, Arial; font-size: 11px;color: #333333;background-color:#eeeeee;'>".$cantidad."</td>
                      <td valign='middle' align='right' style='font-family: Tahoma, Arial; font-size: 11px;color: #333333;background-color:#eeeeee;'>".pasar_euros($precio*$cantidad)."&euro;</td>
                    </tr>";
		
	}
	
	if ($total_articulos=="")
		$total_articulos = 0;
		
		
		 $cuerpo.="<tr>
                      <td valign='middle' style='font-family: Tahoma, Arial; font-size: 11px;color: #333333;'>SUBTOTAL</td>
					  <td align='center' valign='middle' style='font-family: Tahoma, Arial; font-size: 11px;color: #333333;' >&nbsp;</td>
					  <td align='center' valign='middle' style='font-family: Tahoma, Arial; font-size: 11px;color: #333333;' >&nbsp;</td>
                      <td valign='middle' style='font-family: Tahoma, Arial; font-size: 11px;color: #333333;' align='right' >".pasar_euros($total_precio)."&euro;</td>
                    </tr>";
					
	                    
 		 $cuerpo.="<tr>
                      <td valign='middle' style='font-family: Tahoma, Arial; font-size: 11px;color: #333333;'>Gastos de envio</td>
					  <td align='center' valign='middle' style='font-family: Tahoma, Arial; font-size: 11px;color: #333333;' >&nbsp;</td>
					  <td align='center' valign='middle' style='font-family: Tahoma, Arial; font-size: 11px;color: #333333;' >&nbsp;</td>
                      <td valign='middle'  align='right' style='font-family: Tahoma, Arial; font-size: 11px;color: #333333;'>".pasar_euros($gastos)."&euro;</td>
                    </tr>";
					
	                    
 		 $cuerpo.="<tr>
                      <td valign='middle' style='font-family: Tahoma, Arial; font-size: 11px;color: #333333;'>TOTAL</td>
					  <td align='center' valign='middle' style='font-family: Tahoma, Arial; font-size: 11px;color: #333333;' >&nbsp;</td>
					  <td align='center' valign='middle' style='font-family: Tahoma, Arial; font-size: 11px;color: #333333;' >&nbsp;</td>
                      <td valign='middle'  align='right' style='font-family: Tahoma, Arial; font-size: 11px;color: #333333; border:2px solid #80994A;'>".pasar_euros($total_precio+$gastos)."&euro;</td>
                    </tr>";
					
           $cuerpo.='</table></td></tr>';
		  
		  $cuerpo.="<tr><td><br />
<br />
<br /><div style='background-color: #cccccc; color: #e36c0a'>Direcci�n de env�o</div>
<font color='#444444' size='2' face='Arial, Helvetica, sans-serif'>	  
		  Nombre: ".stripslashes($datos['envio_nombre'])."<br />
		  Direcci�n: ".stripslashes($datos['envio_direccion'])."<br />
		  Poblaci�n: ".stripslashes($datos['envio_poblacion'])."<br />
		  Provincia: ".stripslashes($datos['envio_provincia'])."<br />
		  C�digo Postal: ".stripslashes($datos['envio_cp'])."<br />
		  Pa�s: ".stripslashes($datos['envio_pais'])."<br /><br />

		  
		  <div style='background-color: #cccccc; color: #e36c0a'>Direcci�n de facturaci�n</div>	  
		  DNI: ".stripslashes($datos['dni'])."<br />	  
		  Direcci�n: ".stripslashes($datos['direccion'])."<br />
		  Poblaci�n: ".stripslashes($datos['poblacion'])."<br />
		  Provincia: ".stripslashes($datos['provincia'])."<br />
		  C�digo Postal: ".stripslashes($datos['cp'])."<br />
		  Pa�s: ".stripslashes($datos['pais'])."<br />
		  Tel�fono: ".stripslashes($datos['telefono'])."<br /><br /><br />";
		
		$cuerpo.="Atentamente, luciled.com</font></td></tr></table>
";
		
		mail($email,$title,$cuerpo,$cabeceras);
		mail("fernando@internacionalweb.com",$title,$cuerpo,$cabeceras);
			
}
	



function listar_carrito($id){
echo calcular_carrito($id);


}

function calcular_carrito($id=""){

foreach($_SESSION["carrito"] as $key => $cantidad) {
		$total_articulos+= $cantidad;
		$original = $key;
		$arr = explode(";",$key);
		$key = $arr[0];
		$talla = $arr[1];
		
		$sacar_titulo = mysql_query("select precio,nombre from productos where id=".$key);
		$titulo = mysql_result($sacar_titulo,0,"nombre");
		  $precio = mysql_result($sacar_titulo,0,"precio");
				
		$total_precio+= ($precio*$cantidad);
		
		
		 $cadena .= "
		 			  <tr>
					  <td valign='middle' class='tx_1' width='24px' align='center'>
					  <a href='_eliminar.php?id=".$original."'><img src='admin/images/x.png' border=0></td>
                      <td valign='middle' class='tx_1' style='background-color:#ebf9b3;'>".$titulo."</td>
					  <td valign='middle' align='center' class='tx_1'  style='background-color:#ebf9b3;'>".pasar_euros($precio)." &euro;</td>
					  <td align='center' valign='middle' class='tx_1' style='background-color:#ebf9b3;'>".$cantidad."</td>
                      <td valign='middle' class='tx_1' align='center' style='background-color:#ebf9b3;'>".pasar_euros($precio*$cantidad)."&euro;</td>
                    </tr>";
	}
	if ($total_articulos=="")
		$total_articulos = 0;
			
		$cadena.="<tr>
                      <td valign='middle' class='tx_1'>&nbsp;</td>
                      <td valign='middle' class='tx_1'>&nbsp;</td>
					  <td align='center' valign='middle' class='tx_1' >&nbsp;</td>
					  <td align='center' valign='middle' class='tx_1' >&nbsp;</td>
                      <td valign='middle' class='tx_1' align='center' >&nbsp;</td>
                    </tr>";
		
		 $cadena.="<tr>
                      <td valign='middle' class='tx_1' >&nbsp;</td>
                      <td valign='middle' class='tx_1'>SUBTOTAL</td>
					  <td align='center' valign='middle' class='tx_1' >&nbsp;</td>
					  <td align='center' valign='middle' class='tx_1' >&nbsp;</td>
                      <td valign='middle' class='tx_1' align='center' >".pasar_euros($total_precio)."&euro;</td>
                    </tr>";
					   					    
 		 $cadena.="<tr style='height:60px'>
                      <td valign='middle' class='tx_1' >&nbsp;</td>
                      <td valign='middle' class='tx_1' >TOTAL</td>
					  <td align='center' valign='middle' class='tx_1' >&nbsp;</td>
					  <td align='center' valign='middle' class='tx_1' >&nbsp;</td>
                      <td valign='middle' class='tx_1'  align='center' style='border:2px solid #dbf37b;'>".pasar_euros($total_precio+$gastos)."&euro;</td>
                    </tr>";

return $cadena;

}

function listar_carrito_gastos($id){

	$r_productos = mysql_query("select * from pedidos where id='".$id."'");

while($datos = mysql_fetch_array($r_productos)){

		$titulo = $datos['nombre'];
		$precio = $datos['precio'];
		$cantidad = $datos['cantidad'];
		
		$r_gastos = mysql_query("select envio from pedidos where id='".$id."'");
		
		$gastos = mysql_result($r_gastos,0);
				
		$total_precio+= ($precio*$cantidad);
		
		 $cadena .= "<tr>
                      <td valign='middle' class='tx_1' style='background-color:#eeeeee;'>".$titulo."</td>
					  <td valign='middle' align='right' class='tx_1' style='background-color:#eeeeee;'>".pasar_euros($precio)." &euro;</td>
					  <td align='center' valign='middle' class='tx_1' style='background-color:#eeeeee;'>".$cantidad."</td>
                      <td valign='middle' class='tx_1' align='right' style='background-color:#eeeeee;'>".pasar_euros($precio*$cantidad)."&euro;</td>
                    </tr>";
		
	}
	
	if ($total_articulos=="")
		$total_articulos = 0;
	
		
					
		$cadena.="<tr>
                      <td valign='middle' class='tx_1'>&nbsp;</td>
					  <td align='center' valign='middle' class='tx_1' >&nbsp;</td>
					  <td align='center' valign='middle' class='tx_1' >&nbsp;</td>
                      <td valign='middle' class='tx_1' align='right' >&nbsp;</td>
                    </tr>";
		
		 $cadena.="<tr>
                      <td valign='middle' class='tx_1'>SUBTOTAL</td>
					  <td align='center' valign='middle' class='tx_1' >&nbsp;</td>
					  <td align='center' valign='middle' class='tx_1' >&nbsp;</td>
                      <td valign='middle' class='tx_1' align='right' >".pasar_euros($total_precio)."&euro;</td>
                    </tr>";
					    
 		 $cadena.="<tr>
                      <td valign='middle' class='tx_1'>Gastos de env�o</td>
					  <td align='center' valign='middle' class='tx_1' >&nbsp;</td>
					  <td align='center' valign='middle' class='tx_1' >&nbsp;</td>
                      <td valign='middle' class='tx_1' align='right'>".pasar_euros($gastos)."&euro;</td>
                    </tr>";
					    
 		 $cadena.="<tr>
                      <td valign='middle' class='tx_1'>TOTAL</td>
					  <td align='center' valign='middle' class='tx_1' >&nbsp;</td>
					  <td align='center' valign='middle' class='tx_1' >&nbsp;</td>
                      <td valign='middle' class='tx_1' align='right' style='border:2px solid #990000;'>".pasar_euros($total_precio+$gastos)."&euro;</td>
                    </tr>";

return $cadena;

}


function vaciar_carrito(){



	session_destroy($_SESSION['carrito']);

	session_unset($_SESSION['carrito']);

	session_destroy();

	session_unset();

}



function quitar_carrito($id){



	unset($_SESSION['carrito'][$id]);

	

}



function anadir_carrito($id,$cantidad){



	

	if (!isset($_SESSION["carrito"][$id])){

		$_SESSION["carrito"][$id] = $cantidad;

	}else{

		$_SESSION["carrito"][$id]+=$cantidad;

	}





}



function total_compra($id=0){



if ($id!=0) {



	$r_total_compra = mysql_query("select precio,cantidad from productos_pedido where id=".$id);



	while ($tc = mysql_fetch_array($r_total_compra)){

	

		$precio = $tc['precio']*$tc['cantidad'];

		$total_precio+=$precio;

		

	}
	
	$r_envio = mysql_query("select envio from pedidos where id='".$id."'");
	
	$total_precio+=mysql_result($r_envio,0);



} else {

foreach($_SESSION["carrito"] as $key => $cantidad) {
	
		$arr = explode(";",$key);
		$key = $arr[0];
		$talla = $arr[1];

		$sacar_precio = mysql_query("select precio from productos where id=".$key);

		

		$precio = mysql_result($sacar_precio,0);

		

		$total_precio+= ($precio*$cantidad);

		

	}

}		

return $total_precio;



}



function almacenar_carrito($dni,$nombre,$apellidos,$telefono,$email,$direccion,$poblacion,$provincia,$cp,$pais,$envio_nombre,$envio_direccion,$envio_poblacion,$envio_provincia,$envio_cp,$envio_pais){

$sql = "insert into pedidos (dni,nombre,apellidos,telefono,email,direccion,poblacion,provincia,cp,pais,envio_nombre,envio_direccion,envio_poblacion,envio_provincia,envio_cp,envio_pais) values ('".$dni."','".$nombre."','".$apellidos."','".$telefono."','".$email."','".$direccion."','".$poblacion."','".$provincia."','".$cp."','".$pais."','".$envio_nombre."','".$envio_direccion."','".$envio_poblacion."','".$envio_provincia."','".$envio_cp."','".$envio_pais."')";

mysql_query($sql);

$r_id = mysql_query("select max(id) from pedidos");

$id = mysql_result($r_id,0);

foreach($_SESSION["carrito"] as $key => $cantidad) {
		$arr = explode(";",$key);
		$key = $arr[0];
		$talla = $arr[1];
		
		$sacar_titulo = mysql_query("select nombre, precio from productos where id=".$key);
		$titulo = mysql_result($sacar_titulo,0,"nombre");
		$precio = mysql_result($sacar_titulo,0,"precio");
	
		$sql = "insert into productos_pedido (idpedido,idproducto,titulo,precio,cantidad) values ('".$id."','".$key."','".$titulo."','".$precio."','".$cantidad."')";
		
		mysql_query($sql);
		
	}

return encriptar($id);

}



function mostrar_carrito() {



	foreach($_SESSION["carrito"] as $key => $cantidad) {

	

		$total_articulos+= $cantidad;		

	}

	

	if ($total_articulos=="")

		$total_articulos = 0;
		

	echo "Tiene ".$total_articulos." producto";
	
	if($tota_articulos!=1)
		echo "s";
	
	echo " en su cesta";

}

function sacar_categorias($padre,$seleccionado,$seccion){



	$sql = "select * from ".$seccion." where idpadre='".$padre."' order by orden asc";



	



	$r = mysql_query($sql);



	while ($d = mysql_fetch_array($r)){



		if ($seleccionado==$d['id'])



				echo "<option value='".$d['id']."' selected='selected'>".$d['titulo']."</option>";



			else



				echo "<option value='".$d['id']."'>".$d['titulo']."</option>";



		



		



		



	}



	



}
function sacar_subcategorias($padre,$seleccionado,$seccion){

	$sql = "select * from ".$seccion." where idpadre='".$padre."' order by orden desc";	

	$r = mysql_query($sql);

	while ($d = mysql_fetch_array($r)){
	
		if($padre!=0)
			$pre = "&nbsp;&nbsp;&nbsp;";
	

		if ($seleccionado==$d['id'])

				echo "<option value='".$d['id']."' selected>".$pre.$d['nombre']."</option>";

			else

				echo "<option value='".$d['id']."'>".$pre.$d['nombre']."</option>";

		
		sacar_subcategorias($d['id'],$seleccionado,$seccion);

	
	

		

	}

	

}



function existe($ppp){



	if (file_exists($ppp) && $ppp!='')

		return true;

	else

		return false;



}



function listado_categorias(){



	$sql = "select * from categorias where idpadre=0 order by nombre";

	

	$r_categorias = mysql_query($sql);

	

	while ($datos_categorias = mysql_fetch_array($r_categorias)){

	

		echo "<p><span class='titulares'>".$datos_categorias['nombre']."</span><br>";

		

			$sql = "select * from categorias where idpadre=".$datos_categorias['id']." order by nombre";

			

			$r_subcategorias = mysql_query($sql);

			

			while ($datos_subcategorias = mysql_fetch_array($r_subcategorias)) {

				

				echo "<img src='imagenes/point_2.jpg' width='6' height='5'> <a href='categoria.php?id=".$datos_subcategorias['id']."'><span class='libros'>".$datos_subcategorias['nombre']."</span></a><br>";

			}

			echo "</p><br>";

	}

}



function listado_manuales(){



	$sql = "select cat.id as idcategoria, cat.nombre, libros.id, libros.titulo, libros.manual from categorias as cat inner join categorias as cat2 on cat.id = cat2.idpadre inner join libros on cat2.id = libros.idcategoria where cat.idpadre=0 and libros.precio!=0 and libros.manual!='' order by cat.nombre";

	$r_categorias = mysql_query($sql);

	

	while ($datos_categorias = mysql_fetch_array($r_categorias)){

		

		if ($datos_categorias['idcategoria']!=$categoria) {

			echo "</table><br><p><div class='titulares' align='left'>".$datos_categorias['nombre']."</div><table width='100%' cellspacing='5'>";

		}



		$titulo_codificado = base64_encode($datos_categorias['titulo']);

		$manual_codificado = base64_encode($datos_categorias['manual']);

		

		echo "<tr><td class='textos'><table border='0' cellspacing='5' cellpadding='0'><tr><td><a href='download.php?n=".$titulo_codificado."&f=".$manual_codificado."' class='enlaces'><img src='imagenes/pdf_button.png' border='0'></a></td><td><a href='download.php?n=".$titulo_codificado."&f=".$manual_codificado."' class='enlaces'>".$datos_categorias['titulo']."</a></td></tr></table></td></tr>";

			

			

			

			

			if ($datos_categorias['idcategoria']!=$categoria) {

				echo "</p><br>";

				$categoria = $datos_categorias['idcategoria'];

			}

	}

}





function listado_categorias_precio(){



	$sql = "select cat.id as idcategoria, cat.nombre, libros.id, libros.titulo, libros.precio from categorias as cat inner join categorias as cat2 on cat.id = cat2.idpadre inner join libros on cat2.id = libros.idcategoria where cat.idpadre=0 and libros.precio!=0 order by cat.nombre";

	$r_categorias = mysql_query($sql);

	

	while ($datos_categorias = mysql_fetch_array($r_categorias)){

		

		if ($datos_categorias['idcategoria']!=$categoria) {

			echo "</table><br><p><div class='titulares' align='left'>".$datos_categorias['nombre']."</div><table width='100%' style='border: 1px solid #666666;' cellspacing='5'><tr><td width='90%' class='precios'>Descripci�n</td><td class='precios' align='center'>Precio</td></tr>";

		}



		

		

		echo "<tr><td class='textos'><a href='libros.php?id=".$datos_categorias['id']."' class='enlaces'>".$datos_categorias['titulo']."</a></td><td class='textos' align='right'>".pasar_euros($datos_categorias['precio'])." �</td></tr>";

			

			

			

			

			if ($datos_categorias['idcategoria']!=$categoria) {

				echo "</p><br>";

				$categoria = $datos_categorias['idcategoria'];

			}

	}

}







function categoria_titulo($id){



	$sql = "select nombre from categorias where id=".$id;

	$r_nombre = mysql_query($sql);

	echo mysql_result($r_nombre,0);

	



}



function categoria_libros($id,$pagina=1,$limite=10){



	$sql = "select * from libros where idcategoria=".$id." and precio<>0 order by titulo";

	$r_libros = mysql_query($sql);

	

	$cant = mysql_num_rows($r_libros);

	

	while ($datos_libros = mysql_fetch_array($r_libros)){



	echo "<table width='619' border='0' cellspacing='0' cellpadding='0'>



                <tr> 



                  <td width='125' rowspan='2' valign='top'><a href='libros.php?id=".$datos_libros['id']."'>"; ver_imagen($datos_libros['foto_small'],117,103); echo "</a></td>";

	

	echo "<td colspan='2' valign='middle' class='titulares'>".$datos_libros['titulo']."<br>";



    echo "<span class='textos'>".stripslashes($datos_libros['descripcion_corta'])."</span> <a href='libros.php?id=".$datos_libros['id']."' class='masinfo'>(m&aacute;s info)</a></td>";



     echo "           </tr>



                <tr>";

				

				if ($datos_libros['precio']!=0){



                  echo "<td width='440' valign='middle' class='precios'> <div align='right'>Precio: ".$datos_libros['precio']." &euro;<br>(".pasar_PTA($datos_libros['precio'])." PTA) </div></td>



                  <td width='54' valign='middle' class='titulares'><div align='center'>".boton_anadir($datos_libros['id'])."</div></td>";

				  

				 }



                echo "</tr>



              </table>



              <img src='libros/linea.jpg' width='678' height='13'><br>";

	}

	

	if ($cant==0) {

			  

	echo "<span class='textos'>No existen libros en esta categor�a</span>";

			  

	}

		

	

}



function portada_libros($pagina=1,$limite=10){



	$sql = "select * from libros where portada=1 order by fecha desc";

	$r_libros = mysql_query($sql);

	

	$cant = mysql_num_rows($r_libros);

	

	while ($datos_libros = mysql_fetch_array($r_libros)){



	echo "<table width='619' border='0' cellspacing='0' cellpadding='0'>



                <tr> 



                  <td width='125' rowspan='2' valign='top'>";

				  if (existe($datos_libros['foto_small'])){

				  

				 	 echo "<a href='libros.php?id=".$datos_libros['id']."'>"; ver_imagen($datos_libros['foto_small'],117,103); echo "</a></td>";

				  

				  }

	

	echo "<td colspan='2' valign='middle' class='titulares'>".$datos_libros['titulo']."<br>";



    echo "<span class='textos'>".stripslashes($datos_libros['descripcion_corta'])."</span> <a href='libros.php?id=".$datos_libros['id']."' class='masinfo'>(m&aacute;s info)</a></td>";



     echo "           </tr>



                <tr>";

				

				if ($datos_libros['precio']!=0){

				 



                echo "<td width='440' valign='middle' class='precios'> <div align='right'>Precio: ".$datos_libros['precio']." &euro;<br>(".pasar_PTA($datos_libros['precio'])." PTA) </div></td>



                  <td width='54' valign='middle' class='titulares'><div align='center'>".boton_anadir($datos_libros['id'])."</div></td>";

				  

				  }



                echo "</tr>



              </table>



              <img src='libros/linea.jpg' width='678' height='13'><br>";

	}

		

	

}



function ofertas_libros($pagina=1,$limite=10){



	$sql = "select * from libros where oferta=1 order by fecha desc";

	$r_libros = mysql_query($sql);

	

	$cant = mysql_num_rows($r_libros);

	

	while ($datos_libros = mysql_fetch_array($r_libros)){



	echo "<table width='619' border='0' cellspacing='0' cellpadding='0'>



                <tr> 



                  <td width='125' rowspan='2' valign='top'>";

				  if (existe($datos_libros['foto_small'])){

				  

				 	 echo "<a href='libros.php?id=".$datos_libros['id']."'>"; ver_imagen($datos_libros['foto_small'],117,103); echo "</a></td>";

				  

				  }

	

	echo "<td colspan='2' valign='middle' class='titulares'>".$datos_libros['titulo']."<br>";



    echo "<span class='textos'>".stripslashes($datos_libros['texto_oferta'])."</span> <a href='libros.php?id=".$datos_libros['id']."' class='masinfo'>(m&aacute;s info)</a></td>";



     echo "           </tr>



                <tr>";

				

				if ($datos_libros['precio']!=0){

				 



                echo "<td width='440' valign='middle' class='precios'> <div align='right'>Precio: ".$datos_libros['precio']." &euro;<br>(".pasar_PTA($datos_libros['precio'])." PTA) </div></td>



                  <td width='54' valign='middle' class='titulares'><div align='center'>".boton_anadir($datos_libros['id'])."</div></td>";

				  

				  }



                echo "</tr>



              </table>



              <img src='libros/linea.jpg' width='678' height='13'><br>";

	}

		

	

}





function boton_anadir($id){



	return "<a onClick='ventana = window.open(\"anadir_carrito.php?id=".$id."\",\"\",\"width=450,height=100\"); ventana.moveTo(200, 200);' style='cursor:pointer'><img src='libros/carrito.jpg' width='20' height='19' border='0'></a>";



}



function pasar_PTA($euros) {



	$pta = round($euros*166.38615446178471388555422168868);

		

	$pta = number_format($pta,0,",",".");

	

	return $pta;



}



function pasar_euros($euros) {



		

	$eur = number_format($euros,2,",",".");

	

	return $eur;



}



function encriptar($cod){

	$enc = $cod*174983267;

	

	$V1= array(1,2,3,4,5,6,7,8,9,0);

	$V2= array("c","L","e","P","w","X","Z","h","F","Q");

	

	$enc = str_replace($V1,$V2,$enc);

	

	return $enc;

}



function desencriptar($enc){

	$V1= array(1,2,3,4,5,6,7,8,9,0);

	$V2= array("c","L","e","P","w","X","Z","h","F","Q");

	

	$cod = str_replace($V2,$V1,$enc);

	$cod = $cod/174983267;

		

	return $cod;

}





function a_fecha($fecha){

	$fecha = substr($fecha,8,2)."/".substr($fecha,5,2)."/".substr($fecha,0,4);

	return $fecha;

}



	



function fecha_completa($fecha){

	$anoFECHA = (int)substr($fecha,0,4);

	$mesFECHA = (int)substr($fecha,5,2);

	$diaFECHA = (int)substr($fecha,8,2);

	$horaFECHA = (int)substr($fecha,11,2);

	$minutosFECHA = (int)substr($fecha,14,2);

	$segundosFECHA = (int)substr($fecha,17,2);

	

	$time = mktime($horaFECHA,$minutosFECHA,$segundosFECHA,$mesFECHA,$diaFECHA,$anoFECHA);

	

	$dias = array ("", "Lunes", "Martes", "Mi&eacute;rcoles", "Jueves", "Viernes", "S&aacute;bado", "Domingo");

	$meses = array ("", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio","Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

	

	$dia = $dias[date('N',$time)];

	

	$dia2 = date('j',$time);

	

	$mes = $meses[date('n',$time)];

	

	$ano = date('Y',$time);

	

	

	return $dia.", ".$dia2." de ".$mes." ".$ano;



}



function redimensionar_jpeg($img_original, $img_nueva, $img_nueva_anchura, $img_nueva_altura, $restringido=1, $img_nueva_calidad) {

 

// crear imagen desde original

$img = imagecreatefromjpeg($img_original);

 

//Modificamos sus valores



$image_data=getimagesize($img_original);





if($img_nueva_altura==0 && $img_nueva_anchura!=0){ //Redimensionamos la altura



   $rapporto=$image_data[0]/$img_nueva_anchura;

   $img_nueva_altura = $image_data[1]/$rapporto;

   

} elseif($img_nueva_altura!=0 && $img_nueva_anchura==0){ //Redimensionamos la anchura



   $rapporto=$image_data[1]/$img_nueva_altura;

   $img_nueva_anchura = $image_data[0]/$rapporto;

   

} elseif ($img_nueva_altura==0 && $img_nueva_anchura==0) { //Lo dejamos tal cual



	$img_nueva_anchura = $image_data[0];

	$img_nueva_altura = $image_data[1];

	

} elseif ($restringido==0) { //Si no hay que restringirla, son valores maximos

	

	if ($image_data[0]>$img_nueva_anchura || $image_data[1]>$img_nueva_altura) { // Si supera los limites

		

		if ($image_data[0]>$image_data[1]) { //Si es m�s ancho que alto  se restringe la anchura

			

			$rapporto=$image_data[0]/$img_nueva_anchura;

  			$img_nueva_altura = $image_data[1]/$rapporto;

		

		} else { //Si es m�s alta, restringo la altura

		

			$rapporto=$image_data[1]/$img_nueva_altura;

  			$img_nueva_anchura = $image_data[0]/$rapporto;

		

		}

		

	} else { // Si es m�s peque�a la dejo igual

	

		$img_nueva_anchura = $image_data[0];

  		$img_nueva_altura = $image_data[1];

	

	}



}



// crear imagen nueva

$thumb = imagecreatetruecolor($img_nueva_anchura,$img_nueva_altura);

 

// redimensionar imagen original copiandola en la imagen

imagecopyresampled($thumb,$img,0,0,0,0,$img_nueva_anchura, $img_nueva_altura,ImageSX($img),ImageSY($img));

 

// guardar la imagen redimensionada donde indicia $img_nueva

imagejpeg($thumb,$img_nueva,$img_nueva_calidad);

}



?>