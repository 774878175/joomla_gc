<?php

defined('_JEXEC') or die;

class LabControllerPreview extends JControllerAdmin{
	public function getModel($name='Preview',$prefix='LabModel',$config=array('ignore_request'=>true)){
		$model = parent::getModel($name,$prefix,$config);
		return $model;
	}
}

