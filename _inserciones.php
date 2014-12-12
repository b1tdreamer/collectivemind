<?
require_once("login.php");if(!$loginCorrecto){ header("Location: index.php?log_error=2"); }

switch ($_POST["type"]) {
    case "comment":
        $comment=mysqli_real_escape_string($link,$_POST["comment"]);
	$sql="INSERT INTO comments (userId, comment) VALUES('".intval($_SESSION["id"])."','".$comment."')";
	//echo $sql; exit;
	@mysqli_query($link,$sql);
        break;

    case "profile":
	$user=mysqli_real_escape_string($link,$_POST["user"]);
	$sql="UPDATE users SET user = '".$user."' ";
	if($_POST["titulo"]){
        	$titulo=mysqli_real_escape_string($link,$_POST["titulo"]);
		$sql .= ", description = '".$titulo."'";
	}
	if($_POST["email"]){
        	$email=mysqli_real_escape_string($link,$_POST["email"]);
		$sql .= ", email = '".$email."'";
	}
	if($_POST["password"]){
        	$password=hash('sha256', $_POST["password"]);
		$sql .= ", password = '".$password."'";
	}
	if($_POST["url"]){
        	$url=mysqli_real_escape_string($link,$_POST["url"]);
		$sql .= ", url = '".$url."'";
	}
	if ($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_FILES['image'])) {

	  // settings
	  $max_file_size = 1800*1000; // 200kb
	  $valid_exts = array('jpeg', 'jpg', 'png', 'gif');
	  // thumbnail sizes
	  $sizes = array(48 => 48, 120 => 120, 500 => 500);

	  if( $_FILES['image']['size'] < $max_file_size ){
	    // get file extension
	    $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
	    if (in_array($ext, $valid_exts)) {
	      /* resize image */
	      foreach ($sizes as $w => $h) {
		$files[] = resize($w, $h);
	      }
	      $sql .= ", image = '".$files[1]."', thumb = '".$files[0]."', bigimage = '".$files[2]."'";
	    } else {
	      $msg = 'Unsupported file';
	    }
	  } else{
	    echo 'Please upload image smaller than 1800px x 1000px';
	    exit;
	  }
	}

	$sql .= " WHERE id =".intval($_SESSION["id"]);
	mysqli_query($link,$sql);    
	break;

    case label3:
        //code to be executed if n=label3;
        break;
    default:
        //code to be executed if n is different from all labels;
} 
		  
header("Location: home");
?>
		  
