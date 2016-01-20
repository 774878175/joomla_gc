<?php

defined('_JEXEC') or die;

class LabHelper{
	public static function getActions($categoryId=0){
		$user = JFactory::getUser();
		$result = new JObject;

		if(empty($categoryId)){
			$assetName = 'com_lab';
			$level = 'component';
		}else{
			$assetName = 'com_lab.category.' . (int)$categoryId;
			$level = 'category';
		}

		$actions = JAccess::getActions('com_lab', $level);

		foreach($actions as $action){
			$result->set($action->name, $user->authorise($action->name, $assetName));
		}

		return $result;
	}
}

