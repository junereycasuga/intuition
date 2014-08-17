<section class="title">
	<div class="container">
		<div class="row-fluid">
			<div class="span6">
				<h1>Posts</h1>
			</div>
		</div>
	</div>
</section>

<section class="container main">
	<div class="row-fluid">
		<div class="span8">
			<div class="blog">
				<?php foreach($posts as $post) { ?>
				<div class="blog-item well">
					<a href="#">
						<h2><?php echo $post->location; ?></h2>
					</a>
					<div class="blog-meta clearfix">
						<p class="pull-left">
							<i class="icon-user"></i> by <a href="#"><?php echo $post->ownerFirstName . " " . $post->ownerLastName; ?></a>
							&nbsp;|&nbsp;
							<i class="icon-calendar"></i> <?php echo $post->date_posted; ?>
						</p>
					</div>
					<p><?php echo $post->description; ?></p>
					<br><br>
					<a href="#" role="button" class="btn btn-success">Give your insight</a>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</section>