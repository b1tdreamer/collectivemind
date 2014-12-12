<?
require_once("login.php");if(!$loginCorrecto){ header("Location: index.php?log_error=2"); }
$usersQuery = 'SELECT id, user, description, link, image FROM users';
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
				<figure class="pull-left rounded-image message__img">
					<img class="media-object" src="<?=$rcsUsers['image']?>" alt="<?=$rcsUsers['user']?>">
				</figure>
			</a>
			<div class="media-body">
				<h4 class="media-heading message__heading"><?=$rcsUsers['user']?></h4>
				<span><?=$rcsUsers['description']?></span>
				<label class="c-btn--more" for="more1"></label>
			</div>
		</div>
<?
}
?>
		</div>
	</article><!-- /widget -->
</div>
