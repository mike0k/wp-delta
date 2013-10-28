<?php class UserIdentity extends CUserIdentity{
	public $rememberMe;
	public $user;
	private $_id;
	private $safeKeys = array(
		'user' => array(
			'id',
			'username',
			'name',
		),
	);
	
	public function __construct($data=null){
		if(!empty($data) && is_array($data)){
			foreach($data as $key=>$val){
				$this->$key = $val;
			}
		}
	}
	
	public function authenticate() {
		
		//encrypt the input password so it can be compared with the database
		$rawPassword = $this->password;
		$this->password = $this->encryption($rawPassword);

		$this->user = DbStaff::model()->findByAttributes(array('username'=>$this->username));
		
		//DB Fail
		if (empty($this->user)){
			$this->errorCode=self::ERROR_USERNAME_INVALID;
			//var_dump('DB Fail');
			
		//invalid username
		}elseif(empty($this->username) || $this->user->username!=$this->username){
			$this->errorCode=self::ERROR_USERNAME_INVALID;
			//var_dump('invalid username', $this->user->username, $this->username);
			
		//invalid password
		}elseif(empty($this->password) || $this->user->password!=$this->password){
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
			//var_dump('invalid password', $this->user->password, $this->password);
			
		//valid login
		}else{
			$this->errorCode=self::ERROR_NONE;
			$this->_id=$this->user->id;
			$duration=60*60*24*30;
			Yii::app()->user->login($this,$duration);
		}
		
		return !$this->errorCode;
	}
	
	//encrypt a string to the format used for passwords
	public static function encryption($str){
		$salt = Yii::app()->params['salt'];
		$encryption=md5($salt.md5($str.$salt));
		return $encryption;
	}
	
	public function unsetUnsafeData(){
		foreach($this->safeKeys as $varName=>$safeAttrs){
			if(!empty($this->$varName) && is_object($this->$varName)){
				foreach($this->$varName->attributes as $varAttrKey=>$varAttrVal){
					if(!in_array($varAttrKey,$safeAttrs)){
						unset($this->$varName->$varAttrKey);
					}
				}
			}
		}
	}
	
	public function getId(){
        return $this->_id;
    }
	
}