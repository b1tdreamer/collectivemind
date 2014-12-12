<?
require_once("login.php");if(!$loginCorrecto){ header("Location: index.php?log_error=2"); }
$commentsQuery = 'SELECT *, users.user as author FROM comments INNER JOIN users on comments.userId = users.id order by comments.id desc LIMIT 6';
$comments = mysqli_query($link,$commentsQuery);
?>
<div class="col-md-6">
<article class="widget">
	<div class="message__write">
		<form action="_inserciones.php" method="post">
			<input type="text" name="type" value="comment" class="none">
			<input type="file" name="file" id="add_attachment">
			<label for="add_attachment"><i class="pe-7f-chat"></i></label><input type="text" autofocus="" name="comment" placeholder="Escribe un mensaje..."><input type="submit" id="send_msg"><label for="send_msg"><i class="pe-7g-arrow2-up"></i></label></form>
	</div>

	<div class="widget__content">
<?
while($rcsComments = mysqli_fetch_array($comments)){
?>
		<div class="message alert-dismissible">
<?
	if($rcsComments['userId']==$_SESSION['id']){
?>
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true"><i class="pe-7s-close"></i></span><span class="sr-only">Close</span></button>
<?
	}
?>
			<figure class="pull-left rounded-image message__img">
				<img class="media-object" src="<?=$rcsComments["thumb"]?>" alt="<?=$rcsComments["author"]?>">
			</figure>
			<div class="media-body">
				<h4 class="media-heading message__heading">
					<?=$rcsComments["author"]?>
					<span class="pull-right"> <?=timeAgo($rcsComments["date"])?></span>
				</h4>
				<p class="message__msg"><?=stripslashes($rcsComments["comment"])?></p>
			</div>
		</div> <!-- /message -->
<?
}
?>
		
	</div>
</article><!-- /widget -->
</div>
