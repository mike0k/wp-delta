<?php class LoginForm extends CFormModel{
	public $username;
	public $password;
	public $rememberMe = 1;
	private $_identity;

	public function rules(){
		return array(
			array('username, password', 'required'),
			array('rememberMe', 'boolean'),
		);
	}

	public function attributeLabels(){
		return array(
			'rememberMe'=>'Remember me',
		);
	}

	public function login()	{
		if($this->_identity===null){
			$this->_identity=new UserIdentity(array(
				'username'=>trim($this->username),
				'password'=>trim($this->password),
			));
			$this->_identity->authenticate();
		}
		
		if($this->_identity->errorCode===UserIdentity::ERROR_NONE) {
			return true;
		}else{
			return false;
		}
	}
}