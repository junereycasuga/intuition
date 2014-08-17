<?php

class ProfileController extends Controller
{
	public function filters(){
		return array(
			'accessControl',
		);
	}

	public function accessRules(){
		return array(
			array('allow',
				'actions'=>array('index'),
				'expression'=>function(){
					if(Yii::app()->user->isGuest) {
						return false;
					}
					return true;
				},
			),
			array('deny'),
		);
	}

	public function actionIndex(){ 
		$userId 	= 	Yii::app()->user->id;
		$modelUser 	=	Users::model()->findByPk($userId);
		$insights 	=	CreatedInsights::getListOfInsights($userId);
		if(isset($_POST['Users'])){
			$modelUser->attributes = $_POST['Users'];
			$TPassword = new TPassword();
			$modelUser->user_password =  $TPassword->hash($_POST['Users']['user_password']);
			$modelUser->save();
		}
		$this->render('index',array(
				'modelUser' => $modelUser,
				'insights'	=> $insights,
			));
	}
}