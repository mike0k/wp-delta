<head>
	<meta charset="ISO-8859-1" />
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<?php if($this->description != ''):?>
		<meta name="description" content="<?php echo $this->description; ?>" />
	<?php endif; ?>	
	<?php if($this->keywords != ''):?>
		<meta name="keywords" content="<?php echo $this->keywords; ?>" />
	<?php endif; ?>
	
	<?php Yii::app()->clientScript->registerCoreScript('jquery',CClientScript::POS_END); ?>
	<?php Yii::app()->clientScript->registerCoreScript('jquery.ui',CClientScript::POS_END); ?>
	<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/core.js',CClientScript::POS_END); ?>
	
	<?php Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/framework/normalize.css'); ?>
	<?php Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/framework/boilerplate.css'); ?>
	<?php Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/framework/unsemantic.css'); ?>
	<?php Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/jquery-ui/jquery-ui.css'); ?>
	<?php Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/typography.css'); ?>
	<?php Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/core.css'); ?>
	<?php Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/pages.css'); ?>
	<?php Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/browsers.css'); ?>
	<?php Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/devices.css'); ?>
	
	<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/favicon.ico" />
</head>