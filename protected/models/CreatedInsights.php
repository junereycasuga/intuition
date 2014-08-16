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
			array('id, owner_id, category_id, date_created', 'required'),
			array('id, owner_id, category_id', 'length', 'max'=>10),
			array('id, owner_id, category_id, date_created', 'safe', 'on'=>'search'),
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
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('owner_id',$this->owner_id,true);
		$criteria->compare('category_id',$this->category_id,true);
		$criteria->compare('date_created',$this->date_created,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function getListOfInsights(){
		$creations = self::model()->findAllByAttributes('owner_id'=>Yii::app()->user->id);
		
	}
}
