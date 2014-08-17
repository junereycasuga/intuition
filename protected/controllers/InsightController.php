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
				'actions'=>array('index','create','post','details','list','view'),
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
		//$feeds = CreatedInsights::getFeedBacksFromPlace($details->code);
		$this->render('details',array('info'=>$details));

	}

	public function actionList() {
		$posts = CreatedInsights::getAllInsights();
		
		$this->render('list', array(
			'posts'=>$posts
		));
	}
	public function actionView($id){
		$details 			= 	CreatedInsights::getThisInsight($id);
		if($details->owner == Yii::app()->user->id){
			$this->redirect('details?id='.$id);
		}else{
			$getOwnerDetails	=	CreatedInsights::getInsightOwnerDetails($details->owner,$details->insight_id);
			$getFeedbacks 		=	CreatedInsights::getFeedbacks($details->insight_id);
			if($_POST['submitReview']){
				$review = $_POST['postReview'];
				CreatedInsights::insertFeedback(Yii::app()->user->id,$id,$review);
			}
			$this->render('view', array(
				'details'			=>	$details,
				'getOwnerDetails'	=> 	$getOwnerDetails,
				'getFeedbacks'		=>	$getFeedbacks,
			));
		}
	}
}