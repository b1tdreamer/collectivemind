<?
require_once("login.php");if(!$loginCorrecto){ header("Location: index.php?log_error=2"); }
$userQuery = 'SELECT * FROM users WHERE users.id = '. $_SESSION['id'];
$user = mysqli_query($link,$userQuery);
$rcsUser = mysqli_fetch_array($user);
?>
<div class="col-md-8">
	<article class="widget widget__form">
		<header class="widget__header">
			<div class="widget__title">
				<i class="pe-7s-menu"></i><h3>Datos de usuario</h3>
			</div>
			<div class="widget__config">
				<a href="#"><i class="pe-7f-refresh"></i></a>
				<a href="#"><i class="pe-7s-close"></i></a>
			</div>
		</header>

		<div class="widget__content">
		<form action="_inserciones.php" method="post" enctype="multipart/form-data">
			<input type="text" name="type" value="profile" class="none">
			<label for="input-1" class="stacked-label"><i class="pe-7f-user"></i></label><input name="user" type="text" class="stacked-input" id="input-1" value="<?=$rcsUser['user']?>">
			<label for="input-2" class="stacked-label"><i class="pe-7f-portfolio"></i></label><input name="titulo" type="text" class="stacked-input" id="input-2" placeholder="<? if($rcsUser['description']){echo $rcsUser['description'];}else{echo "Título";}; ?>">
			<label for="input-3" class="stacked-label"><i class="pe-7f-mail"></i></label><input name="email" type="text" class="stacked-input" id="input-3" placeholder="<? if($rcsUser['email']){echo $rcsUser['email'];}else{echo "Email";};?>">
			<label for="input-4" class="stacked-label"><i class="pe-7f-key"></i></label><input name="password" type="password" class="stacked-input" id="input-4" placeholder="Password">
			<label for="input-5" class="stacked-label"><i class="pe-7f-link"></i></label><input name="url" type="text" class="stacked-input" id="input-5" placeholder="<? if($rcsUser['link']){echo $rcsUser['link'];}else{echo "Sitio web";};?>">
			<label class="full-label">
				<input name="image" type="file" id="file-att">
				<i class="pe-7f-paperclip"></i><span class="label">Imagen</span>
			</label><button>Actualizar información</button>
		</form>
	</div>
</div>
