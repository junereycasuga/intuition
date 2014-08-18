<div id="listInsight" class="row-fluid">
	<section class="title">
		<div class="container">
			<div class="row-fluid">
				<div class="span6">
					<h1>Posts</h1>
				</div>
			</div>
		</div>
	</section>
	<div class="center">
		<section class="container main span12"><br>
		    <div class="container widget customize-form">
				<div class="row-fluid">
					<div>
						<div class="blog">
							<?php foreach($posts as $post) { ?>
							<div class="blog-item well">
								<div class ="row-fluid">
									<h2 class="pull-left">
										<a href="<?php echo $this->createUrl('insight/view?id='.$post->insight_id); ?>">
											<?php echo $post->location; ?>
										</a>
									</h2>
								</div>
								<div class="row-fluid">
									<div class="blog-meta clearfix">
										<p class="pull-left">
											<i class="icon-user"></i> by <a href="#"><?php echo $post->ownerFirstName . " " . $post->ownerLastName; ?></a>
											&nbsp;|&nbsp;
											<i class="icon-calendar"></i> <?php echo $post->date_posted; ?>
										</p>
										<p class="pull-right">
											<i class="icon-comment pull"></i> <a href="#"><?php echo $post->feedbackCount . " insights"; ?></a>
										</p>
									</div>
									<div class="row-fluid">
										<br><h3 class="pull-left"><?php echo $post->description; ?></h3><br>
									</div>
									<a href="<?php echo $this->createUrl('insight/view?id='.$post->insight_id); ?>" role="button" class="btn btn-success pull-left">Give your insight</a>
								</div>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>