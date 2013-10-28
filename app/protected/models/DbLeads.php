<?php class DbLeads extends ActiveRecord{
	
	public function tableName(){
		return 'db_leads';
	}

	public function rules(){
		return array(
			array('userId, propId, type, status', 'required'),
			
			array('userId, propId, caseHolder, caseHolderTime, addedBy, updated, created', 'numerical', 'integerOnly'=>true),
			array('type, initialType, origin, status', 'length', 'max'=>255),
			array('updated','default', 'value'=>time(), 'setOnEmpty'=>false,'on'=>'update'),
			array('updated,created','default', 'value'=>time(), 'setOnEmpty'=>false,'on'=>'insert'),
			
			array('notes', 'safe'),
			array('id, userId, propId, type, initialType, origin, status, notes, caseHolder, caseHolderTime, addedBy, updated, created', 'safe', 'on'=>'search'),
		);
	}

	public function relations(){
		return array(
			'property' => array(self::BELONGS_TO, 'DbProperties', 'propId'),
			'user' => array(self::BELONGS_TO, 'DbUsers', 'userId'),
		);
	}

	public function attributeLabels(){
		return array(
			'id' => 'ID',
			'userId' => 'User',
			'propId' => 'Prop',
			'type' => 'Type',
			'initialType' => 'Initial Type',
			'origin' => 'Origin',
			'status' => 'Status',
			'notes' => 'Notes',
			'caseHolder' => 'Case Holder',
			'caseHolderTime' => 'Case Holder Time',
			'addedBy' => 'Added By',
			'updated' => 'Updated',
			'created' => 'Created',
		);
	}

	public function search(){
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('userId',$this->userId);
		$criteria->compare('propId',$this->propId);
		$criteria->compare('type',$this->type);
		$criteria->compare('initialType',$this->initialType);
		$criteria->compare('origin',$this->origin,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('notes',$this->notes,true);
		$criteria->compare('caseHolder',$this->caseHolder);
		$criteria->compare('caseHolderTime',$this->caseHolderTime);
		$criteria->compare('addedBy',$this->addedBy);
		$criteria->compare('updated',$this->updated);
		$criteria->compare('created',$this->created);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__){
		return parent::model($className);
	}
	
	public function requiredDefaults(){
		if(empty($this->status)){
			$this->status = 'new';
		}
	}
	
	public $types = array(
		'Valuation'=>'Valuation',
	);
	
	public $origins = array(
		'call'=>'Call', 
		'email'=>'Email',
		'mailShot'=>'Mail Shot',
		'rightmove'=>'Rightmove',
		'selfGen' => 'Self Generated',
		'viewing'=>'Viewing',
		'website'=>'Website',
		'zoopla'=>'Zoopla',
	);
	
	public $statuses = array(
		'new'=>'New',
		'processing' => 'Processing',
		'followUp'=>'Follow Up',
		'unavailable'=>'Unavailable',
		'dead'=>'Dead',
		'business' => 'Business',
	);
}
