<?php class DbStaff extends CActiveRecord{

	public function tableName(){
		return 'db_staff';
	}

	public function rules(){
		return array(
			array('phoneVisibility, updated, created, lastLogin, loginAttempts', 'numerical', 'integerOnly'=>true),
			array('username, password, fName, sName, email, phoneExtension, phoneMobile, phoneDirect, status', 'length', 'max'=>255),
			
			array('id, username, password, fName, sName, email, phoneExtension, phoneMobile, phoneDirect, phoneVisibility, status, updated, created, lastLogin, loginAttempts', 'safe', 'on'=>'search'),
		);
	}

	public function relations(){
		return array(
		);
	}

	public function attributeLabels(){
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'password' => 'Password',
			'fName' => 'F Name',
			'sName' => 'S Name',
			'email' => 'Email',
			'phoneExtension' => 'Phone Extension',
			'phoneMobile' => 'Phone Mobile',
			'phoneDirect' => 'Phone Direct',
			'phoneVisibility' => 'Phone Visibility',
			'status' => 'Status',
			'updated' => 'Updated',
			'created' => 'Created',
			'lastLogin' => 'Last Login',
			'loginAttempts' => 'Login Attempts',
		);
	}

	public function search(){
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('username',$this->username);
		$criteria->compare('password',$this->password);
		$criteria->compare('fName',$this->fName,true);
		$criteria->compare('sName',$this->sName,true);
		$criteria->compare('email',$this->email);
		$criteria->compare('phoneExtension',$this->phoneExtension,true);
		$criteria->compare('phoneMobile',$this->phoneMobile,true);
		$criteria->compare('phoneDirect',$this->phoneDirect,true);
		$criteria->compare('phoneVisibility',$this->phoneVisibility);
		$criteria->compare('status',$this->status);
		$criteria->compare('updated',$this->updated);
		$criteria->compare('created',$this->created);
		$criteria->compare('lastLogin',$this->lastLogin);
		$criteria->compare('loginAttempts',$this->loginAttempts);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__){
		return parent::model($className);
	}
}
