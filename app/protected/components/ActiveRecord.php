<?php class ActiveRecord extends CActiveRecord {
	
	public $age;
	public $preSaveModel;
	public $posted;
	public $edited;
	
	protected function afterFind(){
		$this->setPosted();
		$this->setEdited();
		$this->setAge();
		parent::afterFind();
	}
	
	public function save($runValidation=true,$attributes=null){	
		if(!$runValidation || $this->validate($attributes)){
			if($this->getIsNewRecord()){
				$this->preSaveModel = clone $this;
				return $this->insert($attributes);
			}else{
				$this->preSaveModel = $this->findByPk($this->id);
				$update = false;
				if(empty($this->preSaveModel)){
					$update = true;
				}else{					
					foreach($this->attributes as $name=>$attribute){
						if($this->preSaveModel->$name != $attribute){
							$update = true;
							break;
						}
					}
				}
				if($update){
					return $this->update($attributes);
				}else{
					return true;
				}
			}
		}else{
			return false;
		}
	}
	
	public function camelCase($string) {
		return ucfirst(implode(" ",preg_split("/(?=[A-Z])/",$this->$string)));
	}
	
	public function listErrors(){
		$errors = 'No Errors';
		if(!empty($this->errors)){
			$errors = '';
			foreach($this->errors as $attr){
				if(!empty($attr)){
					foreach($attr as $error){
						$errors .= $error.'<br />';
					}
				}
			}
		}
		return $errors;
	}
	
	public function formatDateDiff($start, $end=null, $type='age') {
		if(!($start instanceof DateTime)) {
			$start = new DateTime($start);
		}
	   
		if($end === null) {
			$end = new DateTime();
		}
	   
		if(!($end instanceof DateTime)) {
			$end = new DateTime($start);
		}
	   
		$interval = $end->diff($start);
		$doPlural = function($nb,$str){return $nb>1?$str.'s':$str;}; // adds plurals
	   
		$data = array();
		if($interval->y > 0) {
			$data[] = array(
				'key' => 'y',
				'val' => '%y',
				'ref' => $doPlural($interval->y, "year")
			);
		}
		if($interval->m > 0) {
			$data[] = array(
				'key' => 'm',
				'val' => '%m',
				'ref' => $doPlural($interval->m, "month")
			);
		}
		if($interval->d > 0) {
			$data[] = array(
				'key' => 'd',
				'val' => '%d',
				'ref' => $doPlural($interval->d, "day")
			);
		}
		if($interval->h > 0) {
			$data[] = array(
				'key' => 'h',
				'val' => '%h',
				'ref' => $doPlural($interval->h, "hour")
			);
		}
		if($interval->i > 0) {
			$data[] = array(
				'key' => 'i',
				'val' => '%i',
				'ref' => $doPlural($interval->i, "minute")
			);
		}
		if($interval->s > 0) {
			if(empty($data)) {
				return "less than a minute ago";
			} else {
				$data[] = array(
					'key' => 's',
					'val' => '%s',
					'ref' => $doPlural($interval->s, "second")
				);
			}
		}
	   
		if(!empty($data)){
			switch($type){
				case 'age':
					$msg = $data[0]['val'].' '.$data[0]['ref'].' ago';
					break;
				case 'double':
					$msg = $data[0]['val'].' '.$data[0]['ref'].' and '.$data[1]['val'].' '.$data[1]['ref'];
					break;
				case 'ending':
					$msg = $data[0]['val'].' <span class="">('.$data[0]['ref'].')</span>';
					break;
				default:
					$msg = $data[0]['val'].' '.$data[0]['ref'];
			}
		}else{
			$msg = $data[0]['val'].' '.$data[0]['ref'];
		}
		
		return $interval->format($msg);
	} 
	
	public function setPosted(){
		if(!empty($this->created)){
			$this->posted = date('H:i j M Y', $this->created);
		}
	}
	
	public function setEdited(){
		if(!empty($this->updated)){
			if(!empty($this->created) && $this->updated==$this->created){
				$this->edited = 'Not Yet Edited';
			}else{
				$this->edited = date('H:i j M Y', $this->updated);
			}
		}
	}
	
	public function setAge(){
		if(!empty($this->created)){
			$tmpCreated = date("c", $this->created);
			$datetime1 = new DateTime($tmpCreated);
			$datetime2 = new DateTime('now');
			$this->age = $this->formatDateDiff($datetime1, $datetime2, 'age');
		}
	}
}