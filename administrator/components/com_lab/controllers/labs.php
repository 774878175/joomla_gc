<?php

defined('_JEXEC') or die;

class LabControllerLabs extends JControllerAdmin{
	public function getModel($name = 'Lab', $prefix = 'LabModel', $config = array('ignore_request'=> true)){
		$model = parent::getModel($name, $prefix, $config);
		return $model;
	}
}