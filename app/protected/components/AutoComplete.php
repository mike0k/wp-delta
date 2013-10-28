<?php

class AutoComplete extends CAction {

    public $model;
	public $strictOptions;
	public $likeOptions;
	
	public $search;
	public $display;
	public $return;
	
    private $results = array();
	private $listLimit = 20;
 
    public function run() {
        if(isset($this->model) && isset($this->search)) {
            $criteria = new CDbCriteria();
			$criteria->limit = $this->listLimit;
			$this->model = new $this->model;
			
			//GET INPUT DATA AND CREATE SQL WHERE STATEMENT
			$terms = array('');
			if(!empty($_GET['term'])){
				$terms = explode(' ',$_GET['term']);
			}
			foreach($terms as $term){
				$criteriaTerm = new CDbCriteria();
				if (!is_array($this->search)) {
					$this->search = array($this->search);
				}				
				foreach($this->search as $searchGroup) {
					if (!is_array($searchGroup)) {
						$searchGroup = array($searchGroup);
					}				
					foreach($searchGroup as $searchAttribute) {
						$criteriaTerm = $this->relatedTables($criteriaTerm,$searchAttribute);
						if (strpos($searchAttribute,'.')) {
							$criteriaTerm->compare($searchAttribute, $term, true, 'OR');
						} else {
							$criteriaTerm->compare('t.'.$searchAttribute, $term, true, 'OR');
						}
					}
				}
				$criteria->mergeWith($criteriaTerm);
			}
			
			//ADD HARD-CODED == CONDITIONS TO SQL WHERE STATEMENT
			if(!empty($this->strictOptions)) {
				foreach($this->strictOptions as $attr=>$option) {
					$criteria = $this->relatedTables($criteria,$attr);
					if (strpos($attr,'.')) {
						$criteria->compare($attr, $option);
					} else {
						$criteria->compare('t.'.$attr, $option);
					}
				}
			}
			
			//ADD HARD-CODED LIKE CONDITIONS TO SQL WHERE STATEMENT
			if(!empty($this->likeOptions)) {
				foreach($this->likeOptions as $attr=>$option) {
					$criteria = $this->relatedTables($criteria,$attr);
					if (strpos($attr,'.')) {
						$criteria->addSearchCondition($attr,$option,true,'AND','LIKE');
					} else {
						$criteria->addSearchCondition('t.'.$attr,$option,true,'AND','LIKE');
					}					
				}
			}
			
			//ADD HARD-CODED == CONDITIONS TO SQL WHERE STATEMENT
            foreach($this->model->findAll($criteria) as $model) {
				if (!is_array($this->display)) {
					$this->display = array($this->display);
				}
				$displayAttributes = array();
				$break = false;
				foreach($this->display as $i=>$displayGroup) {
					if (!is_array($displayGroup)) {
						$displayGroup = $this->display;
						$break = true;
					}
					foreach($displayGroup as $displayAttribute){
						if (strpos($displayAttribute,'.')) {
							$relation = explode('.',$displayAttribute);
							if(!empty($model->$relation[0])){
								$displayAttributes[$i][] = $model->$relation[0]->$relation[1];
							}
						} else {
							$displayAttributes[$i][] = $model->$displayAttribute;
						}								
					}
					if ($break === true) {
						break;
					}
				}

				if(is_array($this->return)) {
					$return = array();
					foreach($this->return as $attribute) {
						// Add relations if needed
						if(strpos($attribute, '.')) {
							$related = explode('.', $attribute);
							$relatedModel =  $model->$related[0];
							$return[$related[1]] = $relatedModel[$related[1]];
						} else {
							$return[$attribute] = $model->$attribute;
						}
					}
					$return['value'] = '';					
					foreach($displayAttributes as $attribute){
						if (!empty($attribute)) {
							if(empty($return['value'])){
								$return['value'] = implode(' ', $attribute);
							}else{
								$return['value'] .= ' :: '.implode(' ', $attribute);
							}
						}
					}			
				}
				$this->results[] = $return;
            }
        }
		if(get_class($this->model) == 'DbUsers'){
			$newUser = new $this->model;
			if(is_array($this->return)){
				$return = array();
				foreach($this->return as $attribute){
					if (strpos($attribute,'.') === false) {
						$return[$attribute] = $newUser->$attribute;
					}
				}
			}
			$return['value'] = "Add New User";
			$this->results[] = $return;			
		}
		
        echo CJSON::encode($this->results);
    }
	
	public function userPhone($id){
		$user = DbUsers::Model()->findByPk($id);
	}
	
	private function relatedTables($model,$attr){
		if(strpos($attr, '.')) {
			$relations = explode('.', $attr);
			if(!empty($relations)){
				$parent = '';
				foreach($relations as $i=>$relation){
					if(($i+1)<count($relations) && $relation!='' && array_key_exists($relation,$this->model->relations())){
						$model->with[] = $parent.$relation;
						$parent .= '.'.$relation;
					}
				}
			}
		}
		return $model;
	}
}
?>