<?
require_once("login.php");if(!$loginCorrecto){ header("Location: index.php?log_error=2"); }
$usersQuery = 'SELECT id, user, image FROM users';
$users = mysqli_query($link,$usersQuery);
?>
<div class="col-md-6">
	<article class="widget">
		<header class="widget__header">
			<div class="widget__title">
				<i class="pe-7f-user"></i><h3>Miembros</h3>
			</div>
			<div class="widget__config">
				<a href="#"><i class="pe-7f-refresh"></i></a>
				<a href="#"><i class="pe-7s-close"></i></a>
			</div>
		</header>

		<div class="widget__content">
<?
while($rcsUsers = mysqli_fetch_array($users)){
?>
		<div class="media message checked">
			<a href="profile-<?=$rcsUsers['id']?>-<?=$rcsUsers['user']?>">
				<img class="media-object post__img" src="<?=$rcsUsers['image']?>" alt="<?=$rcsUsers['user']?>">
			</a>
		</div>
<?
}
?>
		</div>
	</article><!-- /widget -->
</div>
