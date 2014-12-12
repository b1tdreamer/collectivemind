<?
require_once("login.php");if(!$loginCorrecto){ header("Location: index.php?log_error=2"); }
$messagesQuery = "SELECT *, users.thumb AS userThumb, users.thumb AS userThumb , messages.id AS idMess, users.user AS username FROM messages LEFT JOIN users ON messages.idUser = users.id WHERE messages.idUserReceptor = ".intval($_SESSION["id"])." ORDER BY messages.date DESC LIMIT 15";
$messages = mysqli_query($link,$messagesQuery);
$totalmessages = mysqli_num_rows($messages);
?>
<div class="col-md-6">
<article class="widget">
	<header class="widget__header">
		<div class="widget__title">
			<i class="pe-7f-chat"></i><h3>Mensajes</h3> · <span><?=$totalmessages?></span>
		</div>
		<div class="widget__config">
			<a href="#"><i class="pe-7f-refresh"></i></a>
			<a href="#" style="line-height: 68px;"><i class="pe-7g-arrow2-down"></i></a>
		</div>
	</header>

	<div class="widget__content">
<?
while($rcsMessages = mysqli_fetch_array($messages)){
?>
		<div class="message alert-dismissible">
                	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true"><i class="pe-7s-close"></i></span><span class="sr-only">Close</span></button>
			<figure class="pull-left rounded-image message__img">
				<img class="media-object" src="<?=$rcsMessages["userThumb"]?>" alt="<?=$rcsMessages["username"]?>">
			</figure>
			<div class="media-body">
				<h4 class="media-heading message__heading"><?=$rcsMessages["username"]?> <span class="pull-right"><?=timeAgo($rcsMessages["date"])?></span></h4>
				
				<p class="message__msg"><?=$rcsMessages["message"]?></p>
			</div>
		</div> <!-- /message -->
<?
}
?>
	</div>
</article><!-- /widget -->
</div>
