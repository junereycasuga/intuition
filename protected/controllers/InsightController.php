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
				'actions'=>array('index','create','post','details'),
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
		$myInsights = CreatedInsights::getListOfInsights(Yii::app()->user->id);

		$this->render('index',array('insights'=>$myInsights));
	}

	public function actionCreate(){
		$this->render('createInsight');
	}

	public function actionPost(){
		$id = uniqid();
		$owner = Yii::app()->user->id;
		$location = $_POST['locationName'];
		$code = $_POST['locationCode'];
		$description = $_POST['postDescription'];

		CreatedInsights::postInsight($id,$owner,$location,$code,$description);

		$this->redirect('index');
	}

	public function actionDetails($id){
		$details = CreatedInsights::getThisInsight($id);

		Common::pre($details);
	}
}