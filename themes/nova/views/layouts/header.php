<header class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<a href="" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<a href="#" id="logo" class="pull-left"></a>
			<div class="nav-collapse collapse pull-right">
				<ul class="nav">
					<li><a href="#">Home</a></li>
					<li><a href="#">About</a></li>
					<li class="dropdown login">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo Yii::app()->user->userName; ?> <i class="icon-angle-down"></i></a>
						<ul class="dropdown-menu">
							<li><a href="#">My Profile</a></li>
							<li><a href="<?php echo Yii::app()->createUrl('site/logout'); ?>">Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>
</header>