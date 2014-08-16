<?php

class InsightController extends Controller
{
	public function filters(){
		return array(
			'accessControl',
		);
	}

	public function accessRules(){
		return array(
			array('allow',
				'actions'=>array('create'),
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

	public function actionCreate(){
		$this->render('createInsight');
	}
}