<?php

defined('_JEXEC') or die;

class DeviceHelper{
	public static function getActions($categoryId=0){
		$user = JFactory::getUser();
		$result = new JObject();

		if(empty($categoryId)){
			$assetName = 'com_device';
			$level = 'component';
		}else{
			$assetName = 'com_device.category.' . (int)$categoryId;
			$level = 'category';
		}

		$actions = JAccess::getActions('com_device', $level);

		foreach($actions as $action){
			$result->set($action->name, $user->authorise($action->name, $assetName));
		}

		return $result;
	}

	public static function addSubmenu($vName = 'devices'){
		JHtmlSidebar::addEntry(
			JText::_('COM_DEVICE_SUBMENU_PREVIEW'),
			'index.php?option=com_device&view=preview',
			$vName == 'preview'
		);
	}
}

