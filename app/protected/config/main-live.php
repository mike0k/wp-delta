<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'DeltaApp',

	// preloading 'log' component
	'preload'=>array('log','minScript'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'gii'=>array(
            'class'=>'system.gii.GiiModule',
            'password'=>'admin',
		),
	),

	// application components
	'components'=>array(
		/*'cache'=>array(
			'class'=>'system.caching.CApcCache',
		),
		'cache'=>array(
		 'class'=>'system.caching.CDbCache',
				'connectionID'=>'db',
		),
		*/
		'session'=>array(
			'class'=>'CDbHttpSession',
			'connectionID'=>'db',
			'autoCreateSessionTable'=>true,
		),
			
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			'class' => 'WebUser',
		),
		// uncomment the following to enable URLs in path-format

		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'rules'=>array(
				''=>'site/index',
				'login' => 'site/login',
				
				array(
					'class'=>'application.components.UrlRuleDash', //Does the same as 'properties/search/*'=>'properties/index' with different layout,
				),
				
				'gii'=>'gii',
				'gii/<controller:\w+>'=>'gii/<controller>',
				'gii/<controller:\w+>/<action:\w+>'=>'gii/<controller>/<action>', 
				
				'<controller:\w+>'=>'<controller>/index',
				'<view:\w+>/<page:\w+>-page' => 'site/page',
				'<view:\w+>'=>'site/page',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),

		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=demo_deltaecom',
			'emulatePrepare' => true,
			'username' => 'demo_deltae',
			'password' => 'M8ju6Awe',
			'charset' => 'utf8',
			'enableProfiling' => true, //uncomment for debugging
			'enableParamLogging' => true, //uncomment for debugging
			'schemaCachingDuration' => 600,
		),
		
		'errorHandler' => array(
			'errorAction' => 'site/error',
			'discardOutput' => false,
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				//uncomment for debugging
				array(
					'class'=>'ext.yii-debug-toolbar.YiiDebugToolbarRoute',
					//'ipFilters'=>array('127.0.0.1'),
					//'enabled'=>YII_DEBUG,
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
		'widgetFactory'=>array(
			'class'=>'CWidgetFactory',
			'widgets'=>array(
				'CJuiAccordion'=>array('cssFile'=>false),
				'CJuiAutoComplete'=>array('cssFile'=>false),
				'CJuiButton'=>array('cssFile'=>false),
				'CJuiDatePicker'=>array('cssFile'=>false),
				'CJuiDialog'=>array('cssFile'=>false),
				'CJuiDraggable'=>array('cssFile'=>false),
				'CJuiDroppable'=>array('cssFile'=>false),
				'CJuiInputWidget'=>array('cssFile'=>false),
				'CJuiProgressBar'=>array('cssFile'=>false),
				'CJuiResizable'=>array('cssFile'=>false),
				'CJuiSelectable'=>array('cssFile'=>false),
				'CJuiSlider'=>array('cssFile'=>false),
				'CJuiSliderInput'=>array('cssFile'=>false),
				'CJuiSortable'=>array('cssFile'=>false),
				'CJuiTabs'=>array('cssFile'=>false),
				'CJuiTouch'=>array('cssFile'=>false),
				'CJuiWidget'=>array('cssFile'=>false),					
			),				
		),
		
		/*'clientScript'=>array(
				'class'=>'ext.minScript.components.ExtMinScript',
		),*/
	),
		
	'onBeginRequest'=> (YII_DEBUG ? create_function('$event', 'return ob_start();') : create_function('$event', 'return ob_start("ob_gzhandler");')),
	'onEndRequest'=> create_function('$event', 'ob_end_flush();'),
	
	'controllerMap'=>array(
			'min'=>array(
					'class'=>'ext.minScript.controllers.ExtMinScriptController',
			),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'defaultEmail'=>'michael.kirkbright@gmail.com',
		'salt' => 'd6v56-Cgs7ca56%&sdbSC_sv089hou29Jap9',
	),
);