<?php

class CreatedInsights extends CActiveRecord
{
	public function tableName()
	{
		return 'created_insights';
	}

	public function rules()
	{
		return array(
			array('id, owner_id, category_id, date_created, status', 'required'),
			array('id, owner_id, category_id', 'length', 'max'=>10),
			array('id, owner_id, category_id, date_created, status', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{

		return array(
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'owner_id' => 'Owner',
			'category_id' => 'Category',
			'date_created' => 'Date Created',
			'status' => 'Status',
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('owner_id',$this->owner_id,true);
		$criteria->compare('category_id',$this->category_id,true);
		$criteria->compare('date_created',$this->date_created,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function getListOfInsights($id){
		$creations = self::model()->findAllByAttributes(array('owner_id'=>$id));
		$collection = Yii::app()->edmsMongoCollection('insights');
		$creationInfo = $collection->find(array("owner" => $id));
		$creationArray = array();
		if($creations){
			$i = 0;
			foreach($creationInfo as $dataC){
				
				$data = new stdClass;
				$data->id = $dataC['_id'];
				$data->insight_id = $dataC['insight_id'];
				$data->location = $dataC['location'];
				$data->code = $dataC['code'];
				$data->description = $dataC['description'];
				$data->owner = $id;
				$data->feed = $dataC['feedback'];
				$data->date_posted = $creations[$i]['date_created'];
				$i++;
				$creationArray[] = $data;

			}
		}
		return $creationArray;
	}

	public static function getAllInsights() {
		$collection = Yii::app()->edmsMongoCollection('insights');
		$collectionList = $collection->find();
		$collectionArray = array();

		if($collectionList) {
			foreach($collectionList as $list) {
				$data = new stdClass;
				$data->id = $list['_id'];
				$data->insight_id = $list['insight_id'];
				$data->location = $list['location'];
				$data->code = $list['code'];
				$data->description = $list['description'];
				$data->ownerId = Users::model()->findByPk($list['owner'])->id;
				$data->ownerFirstName = Users::model()->findByPk($list['owner'])->user_firstname;
				$data->ownerLastName = Users::model()->findByPk($list['owner'])->user_lastname;
				$data->feedback = $list['feedback'];
				$data->date_posted = self::model()->findByAttributes(array('id'=>$list['insight_id']))->date_created;
				$data->feedbackCount = count($list['feedback']);
				$collectionArray[] = $data;
			}
		}

		return $collectionArray;
	}

	public static function postInsight($id,$owner,$location,$code,$description){

		$model = new CreatedInsights;
		$model->id = $id;
		$model->owner_id = $owner;
		$model->category_id = 1;
		$model->status = 1;
		$model->save(false);

		$data = new stdClass();

		$data->insight_id = $id;
		$data->owner = $owner;
		$data->location = $location;
		$data->code = $code;	
		$data->description = $description;
		$data->feedback = array();

		$collection = Yii::app()->edmsMongoCollection('insights');
		$collection->insert($data);

		return true;

	}

	public static function getThisInsight($id){
		$collection = Yii::app()->edmsMongoCollection('insights');
		$info = $collection->findOne(array("insight_id" => $id));
		$infos = array();
		if($info){
			$data = new stdClass;
			$data->id = $info['_id'];
			$data->insight_id = $info['insight_id'];
			$data->location = $info['location'];
			$data->code = $info['code'];
			$data->description = $info['description'];
			$data->feed = $info['feedback'];
			return $data;
		}
	}

	/*public static function getFeedBacksFromPlace($id){
		$collection = Yii::app()->edmsMongoCollection('insights');
		$info = $collection->find(array("code" => $id));
		$infoArray = array();
		if($info){
			foreach($info as $information){
				if($information['feedback']){
					for($counter = 0; $counter < sizeOf($information['feedback']); $counter++){
						
					}
					$infoArray[] = $data;	
				}
			}
		}
	}*/
}
