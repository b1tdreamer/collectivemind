<?
if ($paginas<=7) { // Si hay 7 paginas o menos, muestra todas     
	$com = "";
	$emp = 1;
	$fin = $paginas;
	$ext = "";
} elseif ($pagina<=4) { //Si estamos en la p&aacute;gia 1,2 o 3        
	$com = "";
	$emp = 1;
	$fin = 7;
	$ext = "...";        
} elseif ($pagina>=$paginas-3) { //Si estamos en las ultimas 3 p&aacute;ginas
	$com = "...";
	$emp = $paginas-6;
	$fin = $paginas;
	$ext = "";
} else { //Si estamos en medio
	$com = "...";
	$emp = $pagina-3;
	$fin = $pagina+3;
	$ext = "...";
}
?>

<? if($paginas>1){ ?>
<table border="0" cellpadding="0" cellspacing="0" class="closer" id="pager">
    <tr>
        <td>
            <?
                if ($prev >= 1) {
            ?>
                <a href="<?=$seccion;?>" class="boton_paginacion">&lt;&lt;</a>
                <a href="<?=$seccion;?><?=$prev==1?'':'-'.$prev;?>" class="boton_paginacion">Anterior</a>
            <?
                }
            ?>
        </td>
        <td>
            <?
                if ($com != '' ) {
            ?>
                <a href="<?=$seccion;?>-<?=$com;?>" class="<? if($pagina==$i){?>paginador_link_seleccionado<? } else { ?>paginador_link<? }?>"><?=$com;?></a> ... 
            <?
                }
                if($paginas > 1) {
                    for($i = $emp; $i <= $fin; $i++) {
            ?>
                <a href="<?=$seccion;?>-<?=$i;?>" class="<? if($pagina==$i){?>paginador_link_seleccionado<? } else { ?>paginador_link<? }?>"><?=$i;?></a>
            <?
                    }
                }
                if ($ext != '') {
            
				if($ext == '...'){
						echo '&hellip;';
					}else{ ?>
            
            	<a href="<?=$seccion;?>-<?=$ext;?>" class="<? if($pagina==$i){?>paginador_link_seleccionado<? } else { ?>paginador_link<? }?>"><?=$ext;?></a>
            
					<? } 
			
                }
            ?>
        </td>
        <td>
            <?
                if($next <= $paginas) {
            ?>
            <a href="<?=$seccion;?>-<?=$next;?>" class="boton_paginacion">Siguiente</a>
            <a href="<?=$seccion;?>-<?=$paginas;?>" class="boton_paginacion">&gt;&gt;</a>
            <? } ?>
        </td>
    </tr>
        <!--td colspan="3" class="central_pager">Mostrado: <?=($pagina-1)*$limite+1;?> a <?=($pagina-1)*$limite+$count;?> de <?=$cant;?></td-->
    </tr>
</table>
<? } ?>