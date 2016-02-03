<?php

defined('_JEXEC') or die;

class DeviceControllerPreview extends JControllerAdmin{
	public function getModel($name='Preview',$prefix='DeviceModel',$config=array('ignore_request'=>true)){
		$model = parent::getModel($name,$prefix,$config);
		return $model;
	}
}

