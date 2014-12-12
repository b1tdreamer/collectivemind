<?
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

/**
 * Image resize
 * @param int $width
 * @param int $height
 */
function resize($width, $height){
  /* Get original image x y*/
  list($w, $h) = getimagesize($_FILES['image']['tmp_name']);
  /* calculate new image size with ratio */
  $ratio = max($width/$w, $height/$h);
  $h = ceil($height / $ratio);
  $x = ($w - $width / $ratio) / 2;
  $w = ceil($width / $ratio);
  /* new file name */
  $path = 'img/users/'.rand(0,9).rand(100,9999).rand(1000,99999).".".str_replace("image/","",$_FILES['image']['type']);
  /* read binary data from image file */
  $imgString = file_get_contents($_FILES['image']['tmp_name']);
  /* create image from string */
  $image = imagecreatefromstring($imgString);
  $tmp = imagecreatetruecolor($width, $height);
  imagecopyresampled($tmp, $image,
    0, 0,
    $x, 0,
    $width, $height,
    $w, $h);
  /* Save image */
  switch ($_FILES['image']['type']) {
    case 'image/jpeg':
      imagejpeg($tmp, $path, 100);
      break;
    case 'image/png':
      imagepng($tmp, $path, 0);
      break;
    case 'image/gif':
      imagegif($tmp, $path);
      break;
    default:
      exit;
      break;
  }
  return $path;
  /* cleanup memory */
  imagedestroy($image);
  imagedestroy($tmp);
}

?>
