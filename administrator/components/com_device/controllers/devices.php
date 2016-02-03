<?php

defined('_JEXEC') or die;

class DeviceControllerDevices extends JControllerAdmin{
	public function getModel($name = 'Device', $prefix = 'DeviceModel', $config = array('ignore_request'=> true)){
		$model = parent::getModel($name, $prefix, $config);
		return $model;
	}
}