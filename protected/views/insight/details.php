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
    </div>
</section>