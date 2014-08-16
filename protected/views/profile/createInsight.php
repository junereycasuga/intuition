<section class="title">
    <div class="container">
        <div class="row-fluid">
            <div class="span6">
                <h1>Create</h1>
            </div>
        </div>
    </div>
</section>
<section class="container">
    <div class="container">
        <div class="row-fluid">
        	<div class="span8">
        		<input type="text" name="location" id="locationData" placeholder="Enter a location">
				<div id="map" style="height:350px"></div>
        	</div>
        </div>
    </div>
</section>
<script>
	$(document).ready(function(){
		INTUITION.map.setMap();
	});
</script>