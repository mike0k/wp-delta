<?php
	$menuItems = array(
		array('label'=>'Something', 'url'=>array('something/index'), 'items'=>array(				
			array('label'=>'Something', 'url'=>array('something/index')),
			array('label'=>'Something Else', 'url'=>array('something/new')),		
		)),
		array('label'=>'Logout', 'url'=>array('site/logout')),
	);

	$this->widget('zii.widgets.CMenu', array(
		'activeCssClass'=>'topNavActive',
		'id'=>'menu',
		'items'=>$menuItems,
	));
?>