<section class="title">
    <div class="container">
        <div class="row-fluid">
            <div class="span6">
                <h1>User Profile</h1>
            </div>
        </div>
    </div>
</section>
<section class="container">
    <div class="container">
        <div class="row-fluid">
            <?php if($modelUser){ ?>
                <div class="span4">
                    <?php $form=$this->beginWidget('CActiveForm', array(
                        'id'=>'community-edit-form',
                        'enableClientValidation'=>true,
                        'clientOptions'=>array(
                            'validateOnSubmit'=>true,
                        ),
                        'htmlOptions' => array(
                            'enctype' => 'multipart/form-data',
                        ),
                    )); ?>
                        <fieldset class="customize-form">
                            <div class="control-group">
                              <div class="controls">
                                <div class="pull-left">
                                        <?php echo $form->labelEx($modelUser,'user_firstname');?>
                                    </div>
                                    <div>
                                        <?php echo $form->textField($modelUser,'user_firstname',array('class'=>'input-xlarge','autocomplete'=>'off'));?>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls">
                                    <div class="pull-left">
                                        <?php echo $form->labelEx($modelUser,'user_lastname');?>
                                    </div>
                                     <div>
                                        <?php echo $form->textField($modelUser,'user_lastname',array('class'=>'input-xlarge','autocomplete'=>'off'));?>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls">
                                    <div class="pull-left">
                                        <?php echo $form->labelEx($modelUser,'user_email');?>
                                    </div>
                                    <div>
                                        <?php echo $form->textField($modelUser,'user_email',array('class'=>'input-xlarge','autocomplete'=>'off'));?>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls">
                                    <div class="pull-left">
                                        <?php echo $form->labelEx($modelUser,'username');?>
                                    </div>
                                    <div>
                                        <?php echo $form->textField($modelUser,'username',array('class'=>'input-xlarge','autocomplete'=>'off'));?>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls">
                                    <div class="pull-left">
                                        <?php echo $form->labelEx($modelUser,'user_password');?>
                                    </div>
                                    <div>
                                        <?php echo $form->passwordField($modelUser,'user_password',array('class'=>'input-xlarge','autocomplete'=>'off'));?>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls">
                                    <button class="btn btn-success btn-large btn-block">Update</button>
                                </div>
                            </div>
                        </fieldset>
                    <?php $this->endWidget(); ?>
                </div>
            <?php } ?>
            <fieldset class="span8 customize-form">
                <section class="title2">
                    <div class="row-fluid">
                        <div class="span">
                            <h1>My Posts
                                <a href="<?php echo $this->createUrl('insight/create'); ?>">
                                    <button class="pull-right btn btn-inverse btn-large">Create</button>
                                </a>
                            </h1>
                        </div>
                    </div>
                </section>
                <section>
                    <div>
                        <?php if($insights){ ?>
                            <br><ul class="faq">
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
                            <br><h2 class="text-error">No Existing Posts</h2>
                        <?php } ?>
                    </div>
                </section>
            </fieldset>
        </div>
    </div>
</section>