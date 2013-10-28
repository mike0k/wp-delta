<?php class DbProperties extends ActiveRecord{
	
	public $address;
	
	protected function afterFind() {
		parent::afterFind();
		$this->address = $this->formatAddress();
	}
	
	public function tableName(){
		return 'db_properties';
	}

	public function rules(){
		return array(		
			array('updated, created', 'numerical', 'integerOnly'=>true),
			array('ref, flatNum, houseNum, street, postcode, area, town, region, status', 'length', 'max'=>255),
			array('updated','default', 'value'=>time(), 'setOnEmpty'=>false,'on'=>'update'),
			array('updated,created','default', 'value'=>time(), 'setOnEmpty'=>false,'on'=>'insert'),
			
			array('notes', 'safe'),
			array('id, ref, flatNum, houseNum, street, postcode, area, town, region, status, notes, updated, created', 'safe', 'on'=>'search'),
		);
	}

	public function relations(){
		return array(
			'finance' => array(self::HAS_ONE, 'DbPropertyFinance', 'propId'),
			'sellers' => array(self::HAS_ONE, 'DbSelers', 'propId'),
			'spec' => array(self::HAS_ONE, 'DbPropertySpec', 'propId'),
		);
	}

	public function attributeLabels(){
		return array(
			'id' => 'ID',
			'ref' => 'Ref',
			'flatNum' => 'Flat Num',
			'houseNum' => 'House Num',
			'street' => 'Street',
			'postcode' => 'Postcode',
			'area' => 'Area',
			'town' => 'Town',
			'region' => 'Region',
			'status' => 'Status',
			'notes' => 'Notes',
			'updated' => 'Updated',
			'created' => 'Created',
		);
	}

	public function search(){
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('ref',$this->ref);
		$criteria->compare('flatNum',$this->flatNum,true);
		$criteria->compare('houseNum',$this->houseNum,true);
		$criteria->compare('street',$this->street,true);
		$criteria->compare('postcode',$this->postcode,true);
		$criteria->compare('area',$this->area,true);
		$criteria->compare('town',$this->town,true);
		$criteria->compare('region',$this->region,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('notes',$this->notes,true);
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
		if(empty($this->ref)){
			$this->ref = $this->newReference();
		}
	}
	
	public static function newReference($type='MS') {
		$ref = $type . mt_rand(0,9) . date('y',strtotime('previous year')) . substr(mt_rand(1000,9999), 1, 3);
		$criteria = new CDbCriteria;
		$criteria->select = 'ref';
		$criteria->compare('ref', $ref);
		if(DbProperties::model()->count($criteria) > 0){
			$ref = PropertiesHelper::newReference($type);
		}
		return $ref;
	}
	
	public function formatAddress(){
		$address = $this->houseNum;
		if(isset($this->flatNum)&& $this->flatNum!=''){
			$address .= '/'.$this->flatNum;
		}
		$address .= ' '.$this->street;
		return $address;
	}
}
