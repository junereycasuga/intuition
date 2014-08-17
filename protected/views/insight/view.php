
<div id="viewInsight" class="row-fluid">
    <section class="title">
        <div class="container">
            <div class="row-fluid">
                <div class="span6">
                    <h1>Post</h1>
                </div>
            </div>
        </div>
    </section>
    <div class="center">
        <section class="container span12"><br>
            <div class="container widget customize-form">
                <div>
                    <h3 class="locationLabel">
                        <div class="row-fluid">
                            <div class="pull-left">
                                <!-- <img src="<?php echo Yii::app()->theme->baseUrl;?>/library/images/mapPin.png" class="pinSize"> -->
                                <?php echo $details->location;?>
                            </div>
                        </div>
                    </h3>
                    <div class="row-fluid">
                        <p class="pull-left">
                            <i class="icon-user"></i> by <a href="#"><?php echo $getOwnerDetails->user_firstname." ".$getOwnerDetails->user_lastname;?></a>
                            &nbsp;|&nbsp;
                            <i class="icon-calendar"></i> <?php echo $getOwnerDetails->date_posted; ?>
                        </p>
                    </div>
                    <div class="row-fluid">
                        <br><h3 class="pull-left"><?php echo $getOwnerDetails->description; ?></h3><br>
                    </div>

                </div>
                <hr>
                <div class="row-fluid">
                    <div class="span12 reviews">
                                <h4>Feedbacks</h4>
                        <div id="comments" class="comments pull-left">
                            <div class="comments-list">
                                <?php if($getFeedbacks) {
                                    foreach($getFeedbacks as $key=>$value) { ?>
                                    <div class="comment-media">
                                        <div class="media-body">
                                            <strong>Feedback by <a href="#"><?php echo Users::model()->findByPk($value['user'])->user_firstname . " " . Users::model()->findByPk($value['user'])->user_lastname; ?></a></strong><br>
                                            <?php echo $value['date'] ?><br><br>
                                            <p><?php echo $value['review']; ?></p>
                                        </div>
                                    </div>
                                    <?php }    
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row-fluid">
                   <form method="POST" action="<?php echo $this->createUrl('insight/view?id='.$getOwnerDetails->id); ?>">
                        <textarea class="span12" rows="5" required="required" placeholder="Enter review here" name="postReview"></textarea>
                        <input type="submit" name="submitReview" value="Post" class="pull-right btn btn-primary btn-large">
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>