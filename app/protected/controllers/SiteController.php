<?php class SiteController extends Controller{
	
	public function actions(){
		return array(
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
				'layout'=>'content',
			),
		);
	}
	
	public function beforeAction($action) {
		$request = new CHttpRequest;
		if ($action->id == 'page') {
			$request = new CHttpRequest;
			$this->breadcrumbs = array(ucfirst($request->getParam('view'))=>array('site/page', 'view'=>$request->getParam('view')));
		}
		return parent::beforeAction($action);
	}
	
	public function actionIndex(){
		$this->render('index');
	}
	
	public function actionLogin() {
		$this->layout = 'login';
		$form = new LoginForm;
		
		if(!empty($_POST['LoginForm'])){
			$form->attributes = $_POST['LoginForm'];
			if($form->login()){
				$this->redirect(array('site/index'));
			}
		}
		
		$this->render('login', array(
			'loginForm' => $form,
		));
	}
	
	public function actionLogout() {
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}