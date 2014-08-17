<style>
    .widget{
        padding:10px;
        border:2px solid lightgrey;
        border-radius:5px;
        background:white;
    }
    #locationData{
        width:50%;
    }
    .overall{
        font-size:20px;
    }
    .reviews{
        font-size:15px;
    }
    #postDescription{
        padding:10px;
    }
</style>
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
    <div class="container widget">
        <div class="row-fluid">
            <div class="span12">
                <input type="text" name="location" id="locationData" placeholder="Enter a location">
                <div id="map" style="height:350px;border:1px solid lightgrey"></div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <h3 id="location_text"></h3>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12 overall">
                <b>Overall Rating : </b><span class="ratingFromGoogle"></span>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12 reviews">
            </div>
        </div>
        <hr/>
        <form name="frm" method="POST" action="<?php echo Yii::app()->createUrl('insight/post'); ?>">
            <input type="hidden" name="locationName" class="locationName">
            <input type="hidden" name="locationCode" class="locationCode">
            <div class="row-fluid">
                <textarea name="postDescription" id="postDescription" class="span12" rows="10" placeholder="Enter Description About this Post Here"></textarea>
            </div>
            <div class="row-fluid">
                <input type="submit" value="POST" class="btn btn-primary btn-large span2">
            </div>
        </form>
    </div>

</section>
<script>
    $(document).ready(function(){
        $('.overall').hide();
        INTUITION.map.setMap();
    });
</script>