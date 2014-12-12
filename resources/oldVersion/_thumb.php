<?
	$img = $_GET['src'];
	$we = $_GET['w'];
	$he = $_GET['h'];
	
	list($w, $h, $tip) = getimagesize($img);
	
	if ($w / $we > $h / $he) { 
		$hp = $h; 
		$wp = round(($we / $he) * $hp); 
	}  else { 
		$wp = $w; 
		$hp = round(($he / $we) * $wp); 
	} 

	$lp = round(($w - $wp) / 2); 
	$tp = round(($h - $hp) / 2); 

	
	if ($tip == 1) { 
		$source = imagecreatefromgif($img); 
	}  elseif ($tip == 2) { 
		$source = imagecreatefromjpeg($img); 
	}  elseif ($tip == 3) { 
		$source = imagecreatefrompng($img); 
	} 
	
	$thumb = imagecreatetruecolor($we, $he); 
	
	imagecopyresampled($thumb, $source, 0, 0, $lp, $tp, $we, $he, $wp, $hp);
	
	header("Content-type: image/jpeg");
	imagejpeg($thumb,'',100);
	
?>