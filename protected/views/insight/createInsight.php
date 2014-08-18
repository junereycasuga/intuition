<div id="createInsight" class="row-fluid">
    <section class="title">
        <div class="container">
            <div class="row-fluid">
                <div class="span6">
                    <h1>Create Post</h1>
                </div>
            </div>
        </div>
    </section>
    <div class="center">
        <section class="container span12"><br>
            <div class="container widget customize-form">
                <div class="row-fluid">
                    <div class="span12">
                        <div class="row-fluid">
                            <input type="text" class="pull-left" name="location" id="locationData" placeholder="Enter a location" value="<?php echo ($_POST['searchLocation'])?$_POST['searchLocation']:"";?>">
                        </div>
                        <div id="map" class="mapSize"></div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="pull-left">
                            <h3 id="location_text"></h3>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="pull-left">
                        <div class="span12 overall">
                            <b>Overall Rating : </b><span class="ratingFromGoogle"></span>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="pull-left">
                        <div class="span12 reviews"></div>
                    </div>
                </div>
                <hr/>
<div class="row-fluid">
                <a href="#postForm" data-toggle="modal" role="button" class="btn btn-success btn-medium pull-right">Want to know others people's insight?</a>
            </div>
            <!-- <hr/> -->
            <div class="modal hide fade in" id="postForm" aria-hidden="false">
                <div class="modal-body">
                    <form name="frm" method="POST" action="<?php echo Yii::app()->createUrl('insight/post'); ?>">
                        <input type="hidden" name="locationName" class="locationName">
                        <input type="hidden" name="locationCode" class="locationCode">
                        <div class="row-fluid">
                            <textarea name="postDescription" id="postDescription" class="span12" rows="10" placeholder="Tell us what you want to know about this place..."></textarea>
                        </div>
                        <div class="row-fluid">
                            <input type="submit" value="POST" class="pull-right btn btn-primary btn-large span2">
                        </div>
                    </form>
                </div>
            </div>
            </div>
        </section>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.overall').hide();
        INTUITION.map.setMap();
    });
</script>