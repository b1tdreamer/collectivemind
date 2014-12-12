<?
require_once("admin/includes/funciones.php");

$gmes = $_GET['mes'];
$gano = $_GET['ano'];

?>
<table border="0" align="center" cellpadding="10" cellspacing="0">
<tr>
  <td><table border="0" cellpadding="0" cellspacing="2" align="center" bgcolor="#FFFFFF" style="border:#ccc 1px solid;">
<?
$value = $_GET['value'];

$diasSem = Array ('L','M','X','J','V','S','D');
$meses = Array ('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');

$aceptar_pasados = 0;

$aceptar_hoy = 0;

$format = "d-m-Y";

if($value!=""){

	$dia = substr($value,0,2);
	$mes = substr($value,3,2);
	$ano = substr($value,6,4);
}
if($gmes!="")
	$mes = $gmes;
	
if($gano!="")
	$ano = $gano;

$anoInicial = date("Y",time());
$anoFinal = date("Y",time())+3;
$dia = 1;
$dias = array();
$fecha = getdate(time());

if($mes=="")
	$mes = $fecha['mon'];
	
if($ano=="")
	$ano = $fecha['year'];

$ANOprev =$ano-1;

$MESANOprev = $ano;
$MESprev = $mes-1;
if($mes==1){
	
	$MESprev = 12;
	$MESANOprev--;
}
$ANOnext =$ano+1;

$MESANOnext = $ano;
$MESnext = $mes+1;
if($mes==12){
	
	$MESnext = 1;
	$MESANOnext++;
}

$fecha = mktime(0,0,0,$mes,$dia,$ano);

$fechaInicioMes = mktime(0,0,0,$mes,1,$ano);
$fechaInicioMes = date("w",$fechaInicioMes);

$ultimoDia = date('t',$fecha);
$numMes = 0;
$pmes = $mes;
$mimes = str_pad($mes, 2, "0", STR_PAD_LEFT);

$sql = "select * from dias where fecha like '".addslashes($ano)."-".addslashes($mimes)."%' and disponibilidad=1 and idapartamento='".addslashes($_GET['idapartamento'])."'";

$r_dias = mysql_query($sql);
while($d_dias = mysql_fetch_array($r_dias)){

	$midias[substr($d_dias['fecha'],8)] = 1;
}


?>
<tr>
  <td colspan="7"><table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr class="calendarDay">
<!--<td width="10%" align="center"><a onclick="cambiar_cal('<?=$_GET['idapartamento'];?>','<?=$ANOprev;?>','<?=$mes;?>');" style="cursor:pointer;">&lt;&lt;</a></td>-->
                                      <td width="10%" align="center"><a onclick="cambiar_cal('<?=$_GET['idapartamento'];?>','<?=$MESANOprev;?>','<?=$MESprev;?>');" style="cursor:pointer;">&lt;</a></td>
                                      <td align="center"><?=$meses[$mes-1]." ".$ano;?></td>
                                      </tr>
                                  </table></td>
                                </tr>
                                <?
                                for ($fila = 0; $fila < 7; $fila++){?>
                                <tr>
                                  <? for ($coln = 0; $coln < 7; $coln++){
								$posicion = Array (1,2,3,4,5,6,0);
								$sel = mktime(0,0,0,$mes,$numMes+1,$ano);
								$fecha_sel = date($format,$sel);
								$ddia = str_pad($numMes+1, 2, "0", STR_PAD_LEFT);
								
								if($fila == 0) {?>
                                  <td align="center" class="calendarCabecera2"><?=$diasSem[$coln];?></td>
                                  <? } elseif(!($numMes && $numMes < $ultimoDia) && !(!$numMes && $posicion[$coln] == $fechaInicioMes)) { ?>
                                  <td align="center" class="calendarNone2">&nbsp;</td>
                                  <? } elseif($aceptar_pasados==0 && ($ano<date("Y") || ($ano==date("Y") && $mes<date("m")) || ($ano==date("Y") && $mes==date("m") && ($numMes+$aceptar_hoy)<date("d")))) { ?>
                                  <td align="center" class="calendarPast2"><div>
                                    <?=(++$numMes);?>
                                  </div></td>
                                  <? } elseif($midias[$ddia]!=1){?>
                                  <td align="center" class="calendarSelected2"><div title="no disponible">
                                    <?=++$numMes;?>
                                  </div></td>
                                  <? } else{?>
                                  <td align="center" class="calendarDay2"><div title="disponible">
                                    <?=(++$numMes);?>
                                  </div></td>
                                  <? }?>
                                  <? }?>
                                </tr>
                                <? 
}
?>
						  </table></td>
						  <td><table border="0" cellpadding="0" cellspacing="2" align="center" bgcolor="#FFFFFF" style="border:#ccc 1px solid;">
<?

if($mes==12){

	$ano+=1;
	$mes = 1;

} else {

	$mes+=1;

}


$anoInicial = date("Y",time());
$anoFinal = date("Y",time())+3;
$dia = 1;
$dias = array();
$fecha = getdate(time());

if($mes=="")
	$mes = $fecha['mon'];
	
if($ano=="")
	$ano = $fecha['year'];


$fecha = mktime(0,0,0,$mes,$dia,$ano);

$fechaInicioMes = mktime(0,0,0,$mes,1,$ano);
$fechaInicioMes = date("w",$fechaInicioMes);

$ultimoDia = date('t',$fecha);
$numMes = 0;
?>

<? 

$mimes = str_pad($mes, 2, "0", STR_PAD_LEFT);

$sql = "select * from dias where fecha like '".addslashes($ano)."-".addslashes($mimes)."%' and disponibilidad=1 and idapartamento='".addslashes($_GET['idapartamento'])."'";

$r_dias = mysql_query($sql);
while($d_dias = mysql_fetch_array($r_dias)){

	$midias2[substr($d_dias['fecha'],8)] = 1;

}


?>
                                        <tr>
                                          <td colspan="7"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr class="calendarDay">
                                              <td align="center"><?=$meses[$mes-1]." ".$ano;?></td>
                                              <td width="10%" align="center"><a onclick="cambiar_cal('<?=$_GET['idapartamento'];?>','<?=$MESANOnext;?>','<?=$MESnext;?>');" style="cursor:pointer;">&gt;</a></td>
                                              <!--<td width="10%" align="center"><a onclick="cambiar_cal('<?=$_GET['idapartamento'];?>','<?=$ANOnext;?>','<?=$pmes;?>');" style="cursor:pointer;">&gt;&gt;</a></td>-->
                                            </tr>
                                          </table></td>
                                        </tr>
                                        <?
for ($fila = 0; $fila < 7; $fila++){?>
                                        <tr>
                                          <? for ($coln = 0; $coln < 7; $coln++){
    $posicion = Array (1,2,3,4,5,6,0);
	$sel = mktime(0,0,0,$mes,$numMes+1,$ano);
	$fecha_sel = date($format,$sel);
	$ddia = str_pad($numMes+1, 2, "0", STR_PAD_LEFT);
	
    if($fila == 0) {?>
                                          <td align="center" class="calendarCabecera2"><?=$diasSem[$coln];?></td>
                                          <? } elseif(!($numMes && $numMes < $ultimoDia) && !(!$numMes && $posicion[$coln] == $fechaInicioMes)) { ?>
                                          <td align="center" class="calendarNone2">&nbsp;</td>
                                          <? } elseif($aceptar_pasados==0 && ($ano<date("Y") || ($ano==date("Y") && $mes<date("m")) || ($ano==date("Y") && $mes==date("m") && ($numMes+$aceptar_hoy)<date("d")))) { ?>
                                          <td align="center" class="calendarPast2"><div>
                                            <?=(++$numMes);?>
                                          </div></td>
                                          <? } elseif($midias2[$ddia]!=1){?>
                                          <td align="center" class="calendarSelected2"><div title="no disponible">
                                            <?=++$numMes;?>
                                          </div></td>
                                          <? } else{?>
                                          <td align="center" class="calendarDay2"><div title="disponible">
                                            <?=(++$numMes);?>
                                          </div></td>
                                          <? }?>
                                          <? }?>
                                        </tr>
                                        <? 
}

?>
                                      </table></td>
                                      </tr>
                                  </table>