<?
require_once("login.php");if(!$loginCorrecto){ header("Location: index.php?log_error=2"); }
if($_GET['user']){
	$userId=intval($link,$_GET['user']);
}else{
	$userId=intval($_SESSION['id']);
}
$userQuery = 'SELECT * FROM users WHERE users.id = '. $userId;
$userR = mysqli_query($link,$userQuery);
$rcsUser = mysqli_fetch_array($userR);
?>
<div class="col-md-6">
	<article class="widget">
		<header class="widget__header">
			<div class="widget__title">
				<i class="pe-7f-user"></i><h3><?=$rcsUser['user']?></h3> · <span><?=$rcsUser['description']?></span>
			</div>
			<div class="widget__config">
				<a href="#"><i class="pe-7f-refresh"></i></a>
				<a href="#"><i class="pe-7s-close"></i></a>
			</div>
		</header>

		<div class="widget__content filled">
			<figure class="post__img">
				<img class="media-object" src="<?=$rcsUser['bigimage']?>" alt="foto <?=$rcsUser['user']?>">
			</figure>
		</div>
	</article><!-- /widget -->
	</div>
