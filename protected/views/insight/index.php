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
                <h1>My Posts</h1>
            </div>
        </div>
    </div>
</section>
<section class="container" id="faqs">
    <div class="container widget">
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