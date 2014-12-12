<?
require_once("login.php");if(!$loginCorrecto){ header("Location: index.php?log_error=2"); }
$userQuery = 'SELECT * FROM users WHERE users.id ='. $_SESSION['id'];
$user = mysqli_query($link,$userQuery);
$rcsUser = mysqli_fetch_array($user);
?>
<aside class="sidebar">		
	<div class="user-info">
        <a href="profile">
            <figure class="rounded-image profile__img">
                <img class="media-object" src="<?=$rcsUser['image']?>" alt="user">
            </figure>
            <h2 class="user-info__name"><?=$rcsUser['user']?></h2>
            <h3 class="user-info__role"><?=$rcsUser['description']?></h3>
        </a>
		<ul class="user-info__numbers">
			<li>
				<i class="pe-7f-user"></i>
				<p>26k+</p>
				<p>+14</p>
			</li>
			<li>
				<i class="pe-7f-paper-plane"></i>
				<p>1095+</p>
				<p>+56</p>
			</li>
			<li>
				<i class="pe-7g-watch"></i>
				<p>428</p>
				<p>+38</p>
			</li>
		</ul>
	</div> <!-- /user-info -->

	<ul class="main-nav">
	    <li<?=($mode=='home')?' class="main-nav--active"':'';?>>
		<a class="main-nav__link" href="home">
		    <span class="main-nav__icon"><i class="pe-7f-home"></i></span>
		    Home
		</a>
	    </li>
	    <li>
		<a class="main-nav__link" href="ui.html">
		    <span class="main-nav__icon"><i class="pe-7f-edit"></i></span>
		    Informarte
		</a>
	    </li>
	    <li>
		<a class="main-nav__link" href="#" onclick="return false;">
		    <span class="main-nav__icon"><i class="pe-7f-monitor"></i></span>
		    Aprender
		</a>
	    </li>
	    <li>
		<a class="main-nav__link" href="tables.html">
		    <span class="main-nav__icon"><i class="pe-7f-note"></i></span>
		    Entretenerse
		</a>
	    </li>
	    <li>
		<a class="main-nav__link" href="stats.html">
		    <span class="main-nav__icon"><i class="pe-7f-graph3"></i></span>
		    Statistics
		</a>
	    </li>
	    <li>
		<a class="main-nav__link" href="grid.html">
		    <span class="main-nav__icon"><i class="pe-7f-browser"></i></span>
		    ¿Qué hay hoy?
		</a>
	    </li>
	</ul>
	
</aside> <!-- /sidebar -->
