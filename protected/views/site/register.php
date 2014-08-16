<section class="title">
	<div class="container">
		<div class="row-fluid">
			<div class="span6">
				<h1>Registration</h1>
			</div>
		</div>
	</div>
</section>

<section id="registration-page" class="container">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'register-form',
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
					<?php echo $form->textField($modelRegister,'username', array('placeholder'=>'Username', 'class'=>'input-xlarge')); ?>
					<?php echo $form->error($modelRegister,'username'); ?>
				</div>
			</div>

			<div class="control-group">
				<div class="controls">
					<?php echo $form->passwordField($modelRegister,'user_password', array('placeholder'=>'Password', 'class'=>'input-xlarge')); ?>
					<?php echo $form->error($modelRegister,'user_password'); ?>
				</div>
			</div>

			<div class="control-group">
				<div class="controls">
					<?php echo $form->textField($modelRegister,'user_email', array('placeholder'=>'Email Address', 'class'=>'input-xlarge')); ?>
					<?php echo $form->error($modelRegister,'user_email'); ?>
				</div>
			</div>

			<div class="control-group">
				<div class="controls">
					<?php echo $form->textField($modelRegister,'user_firstname', array('placeholder'=>'First Name', 'class'=>'input-xlarge')); ?>
					<?php echo $form->error($modelRegister,'user_firstname'); ?>
				</div>
			</div>

			<div class="control-group">
				<div class="controls">
					<?php echo $form->textField($modelRegister,'user_lastname', array('placeholder'=>'Last Name', 'class'=>'input-xlarge')); ?>
					<?php echo $form->error($modelRegister,'user_lastname'); ?>
				</div>
			</div>

			<div class="control-group">
				<div class="controls">
					<input type="submit" value="Register" class="btn btn-success btn-large btn-block" name="btnRegister">
				</div>
			</div>
		</fieldset>
	<?php $this->endWidget(); ?>
</section>