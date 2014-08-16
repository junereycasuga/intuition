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
		$myInsights = CreatedInsights::getListOfInsights();
		$this->render('index');
	}
}