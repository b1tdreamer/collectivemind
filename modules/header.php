<header class="top-bar">		
	<div class="main-brand">
		<div class="main-brand__container">
			<div class="main-logo"><img src="img/logo.png"></div>
        		<h1 class="main-header__title">Collective Mind</h1>
		</div>
	</div>

	<div class="main-search">
		<input type="text" placeholder="Buscar ..." id="msearch">
		<label for="msearch">
			<i class="pe-7s-search"></i>
		</label>
		<button>
			<i class="pe-7g-arrow-circled pe-rotate-90"></i>
		</button>
	</div>
	
	<ul class="profile"> 
		<li>
			<a href="messages" class="btn-circle btn-sm<?=($mode=='messages')?' active"':'';?>">
				<i class="pe-7f-mail"></i>
				<!--span class="badge badge--blue"></span-->
			</a>
		</li>
		<li>
			<a href="profile" class="btn-circle btn-sm<?=($mode=='profile')?' active"':'';?>">
				<i class="pe-7g-user"></i>
			</a>
		</li>
		<li>
			<a href="configuration" class="btn-circle btn-sm<?=($mode=='configuration')?' active"':'';?>">
				<i class="pe-7g-sets"></i>
			</a>
		</li>
		<li>
			<a href="logout" class="btn-circle btn-sm">
				<i class="pe-7f-power"></i>
			</a>
		</li>
		<li class="mobile-nav">
			<a href="#" onclick="return false;" class="btn-circle btn-sm">
				<i class="pe-7f-menu"></i>
			</a>
		</li>
	</ul>
	
</header> <!-- /top-bar -->
