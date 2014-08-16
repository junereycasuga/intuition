<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */
?>

<h1>Login</h1>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
	<div class="row">
		<?php echo $form->labelEx($modelLogin,'username'); ?>
		<?php echo $form->textField($modelLogin,'username'); ?>
		<?php echo $form->error($modelLogin,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelLogin,'user_password'); ?>
		<?php echo $form->passwordField($modelLogin,'user_password'); ?>
		<?php echo $form->error($modelLogin,'user_password'); ?>
	</div>

	<div class="row rememberMe">
		<?php echo $form->checkBox($modelLogin,'rememberMe'); ?>
		<?php echo $form->label($modelLogin,'rememberMe'); ?>
		<?php echo $form->error($modelLogin,'rememberMe'); ?>
	</div>

	<div class="row">
		<input type="submit" value="Login" name="btnLogin">
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->

<h1>Register</h1>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'register-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	)
)); ?>
	<div class="row">
		<?php echo $form->labelEx($modelRegister,'username'); ?>
		<?php echo $form->textField($modelRegister,'username'); ?>
		<?php echo $form->error($modelRegister,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelRegister,'user_password'); ?>
		<?php echo $form->passwordField($modelRegister,'user_password'); ?>
		<?php echo $form->error($modelRegister,'user_password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelRegister,'user_email'); ?>
		<?php echo $form->textField($modelRegister,'user_email'); ?>
		<?php echo $form->error($modelRegister,'user_email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelRegister,'user_firstname'); ?>
		<?php echo $form->textField($modelRegister,'user_firstname'); ?>
		<?php echo $form->error($modelRegister,'user_firstname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelRegister,'user_lastname'); ?>
		<?php echo $form->textField($modelRegister,'user_lastname'); ?>
		<?php echo $form->error($modelRegister,'user_lastname'); ?>
	</div>

	<div class="row">
		<input type="submit" value="Register" name="btnRegister">
	</div>
<?php $this->endWidget(); ?>
</div>