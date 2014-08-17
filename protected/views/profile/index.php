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
        <div class="row-fluid center">
            <?php if($modelUser){ ?>
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
               <fieldset class="registration-form">
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
                            <button class="btn btn-success btn-large btn-block">Submit</button>
                        </div>
                    </fieldset>

                </div>
                <?php $this->endWidget(); ?>
            <?php } ?>
        </div>
    </div>
</section>