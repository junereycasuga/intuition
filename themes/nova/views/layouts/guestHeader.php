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
					<li><a href="<?php echo Yii::app()->createUrl('site/index'); ?>">Home</a></li>
					<li><a href="#">About</a></li>
					<li class="login"><a href="<?php echo Yii::app()->createUrl('site/login'); ?>">Login</a></li>
				</ul>
			</div>
		</div>
	</div>
</header>