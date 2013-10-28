<?php class Controller extends CController{
	
	public $breadcrumbs=array();
	public $description = '';
	public $keywords = '';
	public $layout='main';
	public $loggedIn = false;
	public $menu=array();
	public $user;
	
	protected function beforeAction($action) {
		$this->forceLogin();
		$this->setUser();
		return parent::beforeAction($action);
	}
	
	public function actionRenderUserDetails() {
		if (!empty($_POST['id'])){
			$user = DbUsers::model()->findByPk($_POST['id']);
			if (!empty($user)) {
				return $this->renderPartial('//common/userView',array('user'=>$user));
			}
		}
		return null;
	}
	
	function forceLogin(){
		if(Yii::app()->controller->id.'/'.Yii::app()->controller->action->id != 'site/login'){
			if(!$this->isLoggedIn()){
				$this->redirect(array('site/login'));
			}
		}else{
			if($this->isLoggedIn()){
				$this->redirect(array('site/index'));
			}
		}
	}
	
	public function actionError(){
		if($error=Yii::app()->errorHandler->error)
			$this->render('404', $error);
	}
	
	protected function setUser($id=null) {
		if(empty($id) && !empty(Yii::app()->user->id)){
			$id = Yii::app()->user->id;
		}
		if(!empty($id)){
			$this->user = DbStaff::Model()->findByPk($id);
			$this->loggedIn = true;
		}
		
		if(empty($this->user)){
			$this->user = new DbStaff;
		}
	}
	
	
	//Set meta tags
	public function beforeRender($view) {
		$this->pageTitle = Yii::app()->name;
		$this->description = Yii::app()->name;
		$page;
		/*if ($this->action->id == 'page') {
			if (isset($_GET['view'])) {
				$page = MflPages::model()->findByAttributes(array('view'=>$_GET['view']));
			}
		} else {
			$page = MflPages::model()->findByAttributes(array('controller'=>$this->id, 'action'=>$this->action->id));
		}
		if (!empty($page)){
			$this->pageTitle = $page->metaTitle;
			$this->description = $page->metaDesc;
			$this->keywords = $page->metaKeywords;
		}
		if(!empty($this->description)){
			Yii::app()->clientScript->registerMetaTag('description', substr($this->description,0,165));
		}
		if(!empty($this->keywords)){
			Yii::app()->clientScript->registerMetaTag('keywords', $this->keywords);	
		}
		if(empty($this->featured)){
			$featuredLimit = 20;
			$this->featured = MfgPropertyFeatured::model()->with('property','property.finance')->findAll(array('order' => 'RAND()','limit'=>$featuredLimit));
		}*/
		return true;
	}
	
	protected function honeypot() {
		return (!empty($_POST) && isset($_POST['honeypot']) && $_POST['honeypot'] === '');
	}
	
	public function isLoggedIn(){
		if(!empty(Yii::app()->user->id)){
			return true;
		}
		return false;
	}
	
}