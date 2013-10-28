<?php
/*
'referenceName'=>array( // name this will be called by (Controller/referenceName)
	'class'=>'application.components.AutoComplete', // Auto-Complplete component to use
	'model'=>'modelName', // model to be used (1 model name only)
	'attribute'=>array('column1',array('column2','column3'),array('column4')), // text to be displayed in drop-down
	'assoc'=>array('columnName', 'relation.columnName'), // data to be returned in json format
),
*/

class AutoCompleteController extends Controller
{
	public function actions(){
		return array(		
			'staffList'=>array(
				'class'=>'application.components.AutoComplete',
				'model'=>'DbStaff',
				'search'=>array('fName','sName'),
				'display'=>array('fName','sName'),
				'return'=>array('id', 'title', 'fName', 'sName', 'email'),
				'strictOptions'=> array('status' => 'active'),
			),
			'userList'=>array(
				'class'=>'application.components.AutoComplete',
				'model'=>'DbUsers',
				'search'=>array(array('title','fName','sName'),array('email')),
				'display'=>array(array('title','fName','sName'),array('email')),
				'return'=>array('id', 'title', 'fName', 'sName', 'email', 'phoneHome', 'phoneWork', 'phoneMobile', 'contactTime', 'contactPref'),
			),
		);
	}

}