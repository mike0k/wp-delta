<?php class DbUsers extends ActiveRecord{
	
	public $name;
	public $formalName;
	public $fullName;
	
	public function setName(){
		if(!empty($this->title) &&!empty($this->fName) && !empty($this->sName)){
			$this->name = $this->fName;
			$this->formalName = $this->title.' '.$this->sName;
			$this->fullName = $this->title.' '.$this->fName.' '.$this->sName;
		}elseif(!empty($this->title) && !empty($this->sName)){
			$this->name = $this->fName;
			$this->formalName = $this->title.' '.$this->sName;
			$this->fullName = $this->formalName;
		}elseif(!empty($this->fName) && !empty($this->sName)){
			$this->name = $this->fName;
			$this->formalName = ucFirst(substr($this->fName,0,1)).'. '.$this->sName;
			$this->fullName = $this->fName.' '.$this->sName;
		}elseif(!empty($this->fName)){
			$this->name = $this->fName;
			$this->formalName = $this->name;
			$this->fullName = $this->name;
		}
	}
	
	public function tableName(){
		return 'db_users';
	}

	public function rules(){
		return array(
			array('fName, sName', 'required'),
		
			array('unsubscribe, updated, created', 'numerical', 'integerOnly'=>true),
			array('company, email, title, fName, sName, phoneHome, phoneWork, phoneMobile, phoneFax, contactTime, contactPref, origin, flatNum, houseNum, street, area, town, region, postCode', 'length', 'max'=>255),
			array('updated','default', 'value'=>time(), 'setOnEmpty'=>false,'on'=>'update'),
			array('updated,created','default', 'value'=>time(), 'setOnEmpty'=>false,'on'=>'insert'),
			
			array('notes', 'safe'),
			array('id, company, email, title, fName, sName, phoneHome, phoneWork, phoneMobile, phoneFax, unsubscribe, contactTime, contactPref, notes, origin, updated, created, flatNum, houseNum, street, area, town, region, postCode', 'safe', 'on'=>'search'),
		);
	}

	public function relations(){
		return array(
		);
	}

	public function attributeLabels(){
		return array(
			'id' => 'ID',
			'email' => 'Email',
			'company' => 'Company',
			'title' => 'Title',
			'fName' => 'F Name',
			'sName' => 'S Name',
			'phoneHome' => 'Phone Home',
			'phoneWork' => 'Phone Work',
			'phoneMobile' => 'Phone Mobile',
			'phoneFax' => 'Phone Fax',
			'unsubscribe' => 'Unsubscribe',
			'contactTime' => 'Contact Time',
			'contactPref' => 'Contact Pref',
			'notes' => 'Notes',
			'origin' => 'Origin',
			'updated' => 'Updated',
			'created' => 'Created',
			'flatNum' => 'Flat Num',
			'houseNum' => 'House Num',
			'street' => 'Street',
			'area' => 'Area',
			'town' => 'Town',
			'region' => 'Region',
			'postCode' => 'Post Code',
		);
	}

	public function search(){
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('email',$this->email);
		$criteria->compare('company',$this->company);
		$criteria->compare('title',$this->title);
		$criteria->compare('fName',$this->fName,true);
		$criteria->compare('sName',$this->sName,true);
		$criteria->compare('phoneHome',$this->phoneHome,true);
		$criteria->compare('phoneWork',$this->phoneWork,true);
		$criteria->compare('phoneMobile',$this->phoneMobile,true);
		$criteria->compare('phoneFax',$this->phoneFax,true);
		$criteria->compare('unsubscribe',$this->unsubscribe);
		$criteria->compare('contactTime',$this->contactTime);
		$criteria->compare('contactPref',$this->contactPref);
		$criteria->compare('notes',$this->notes,true);
		$criteria->compare('origin',$this->origin);
		$criteria->compare('updated',$this->updated);
		$criteria->compare('created',$this->created);
		$criteria->compare('flatNum',$this->flatNum,true);
		$criteria->compare('houseNum',$this->houseNum,true);
		$criteria->compare('street',$this->street,true);
		$criteria->compare('area',$this->area,true);
		$criteria->compare('town',$this->town,true);
		$criteria->compare('region',$this->region,true);
		$criteria->compare('postCode',$this->postCode,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__){
		return parent::model($className);
	}
	
	static public $titles = array(
		'Mr'	=>'Mr',
		'Mrs'	=>'Mrs',
		'Miss'	=>'Miss',
		'Ms'	=>'Ms',
		'Dr'	=>'Dr',
	);
	
	static public $contactMethods = array(
		'Any' =>'Any',
		'Email'=>'Email',
		'Fax'=>'Fax',
		'Phone Mobile'=>'Phone Mobile',
		'Phone Home'=>'Phone Home',
		'Phone Work'=>'Phone Work',					
	);
	
	static public $contactTimes = array(
		'Any'=>'Any',
		'Morning'=>'Morning',
		'Afternoon'=>'Afternoon',
		'Evening'=>'Evening'			
	);
}
