<style>
	.widget{
        padding:10px;
        border:2px solid lightgrey;
        border-radius:5px;
        background:white;
    }
    p{
    	font-size:18px;
    }
</style>
<section class="title">
    <div class="container">
        <div class="row-fluid">
            <div class="span6">
                <h2><?php echo $info->location;?></h2>
            </div>
        </div>
    </div>
</section>
<section class="container">
    <div class="container widget">
    	<div class="row-fluid">
	    	<div class="span12">
	    		<p>
	    			<?php echo $info->description;?>
	    		</p>
	    	</div>
    	</div>
        <hr/>
        <div class="row-fluid">
            <div class="span12 reviews">
                <div id="comments" class="comments">
                    <div class="comments-list">
                    <?php if($info->feed){ 
                        foreach($info->feed as $feed) { ?>
                            <h4>Feedbacks</h4>
                                <div class="comment media">
                                    <div class="media-body">
                                        <strong>Feedback by <a href="#"><?php echo Users::model()->findByPk($feed['user'])->user_firstname . " " . Users::model()->findByPk($feed['user'])->user_lastname; ?></a></strong><br>
                                        <?php echo $feed['date'] ?><br><br>
                                        <p><?php echo $feed['review']; ?></p>
                                    </div>
                                </div>
                        <?php }
                    }else{ ?>
                        <h2 class="text-error">No Feedbacks for this Post</h2>
                    <?php } ?>
                    </div>
                </div>         
            </div>
        </div>
    </div>
</section>