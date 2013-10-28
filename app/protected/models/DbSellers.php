<?php class DbSellers extends ActiveRecord{

	public function tableName(){
		return 'db_sellers';
	}

	public function rules(){
		return array(
			array('userId, propId, status', 'required'),
			
			array('userId, propId, mainContact, updated, created', 'numerical', 'integerOnly'=>true),
			array('type, status', 'length', 'max'=>255),
			array('updated','default', 'value'=>time(), 'setOnEmpty'=>false,'on'=>'update'),
			array('updated,created','default', 'value'=>time(), 'setOnEmpty'=>false,'on'=>'insert'),
			
			array('id, userId, propId, type, mainContact, status, updated, created', 'safe', 'on'=>'search'),
		);
	}

	public function relations(){
		return array(
		);
	}

	public function attributeLabels(){
		return array(
			'id' => 'ID',
			'userId' => 'User',
			'propId' => 'Prop',
			'type' => 'Type',
			'mainContact' => 'Main Contact',
			'status' => 'Status',
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
		$criteria->compare('mainContact',$this->mainContact);
		$criteria->compare('status',$this->status);
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
			$this->status = 'active';
		}
	}
}
