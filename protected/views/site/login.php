<section class="title">
	<div class="container">
		<div class="row-fluid">
			<div class="span6">
				<h1>Login</h1>
			</div>
		</div>
	</div>
</section>

<section id="registration-page" class="container">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'login-form',
		'enableClientValidation'=>true,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
		),
		'htmlOptions'=>array(
			'class'=>'center'
		)
	)); ?>
		<fieldset class="registration-form">
			<div class="control-group">
				<div class="controls">
					<?php echo $form->textField($modelLogin,'username', array('placeholder'=>'Username', 'class'=>'input-xlarge')); ?>
					<?php echo $form->error($modelLogin,'username'); ?>
				</div>
			</div>

			<div class="control-group">
				<div class="controls">
					<?php echo $form->passwordField($modelLogin,'user_password', array('placeholder'=>'Password', 'class'=>'input-xlarge')); ?>
					<?php echo $form->error($modelLogin,'user_password'); ?>
				</div>
			</div>

			<div class="control-group">
				<div class="controls">
					<?php echo $form->checkBox($modelLogin,'rememberMe'); ?>
					<?php echo $form->label($modelLogin,'rememberMe'); ?>
					<?php echo $form->error($modelLogin,'rememberMe'); ?>
				</div>
			</div>

			<div class="control-group">
				<div class="controls">
					<input type="submit" value="Login" class="btn btn-success btn-large btn-block" name="btnLogin">
				</div>
			</div>

			<div class="control-group">
				<p class="pull-right">Don't have an account? Register <a href="<?php echo Yii::app()->createUrl('site/register'); ?>">here</a></p>
			</div>
		</fieldset>

	<?php $this->endWidget(); ?>
</section>