<div id="indexInsight" class="row-fluid">
    <section class="title">
        <div class="container">
            <div class="row-fluid">
                <div class="span">
                    <h1>My Posts
                        <a href="<?php echo $this->createUrl('insight/create'); ?>">
                            <button class="pull-right btn btn-inverse btn-large">Create</button>
                        </a>
                    </h1>
                </div>
            </div>
        </div>
    </section>
    <section class="container span12"><br>
        <div class="container widget customize-form">
        	<?php if($insights){ ?>
    	    	<ul class="faq">
    	    		<?php for($counter = 0; $counter < sizeOf($insights); $counter++){ ?>
    	    			<li>
    			            <span class="number"><?php echo $counter+1; ?></span>
    			            <div>
    			                <h3><a href="<?php echo $this->createUrl('insight/details?id='.$insights[$counter]->insight_id); ?>"><?php echo $insights[$counter]->location; ?></a></h3>
    			                <p>
    			                	<?php echo $insights[$counter]->description; ?>
    			                	<br/>
    			                	<small class="muted">Date Posted : <?php echo $insights[$counter]->date_posted; ?></small>
    			                </p>
    			            </div>
    			        </li>
    	        	<?php } ?>
        		</ul>
        	<?php }else{ ?>
        		<h2 class="text-error">No Existing Posts</h2>
        	<?php } ?>
        </div>
    </section>
</div>