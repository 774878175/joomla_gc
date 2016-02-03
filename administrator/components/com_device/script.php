<?php

defined('_JEXEC') or die;

class com_deviceInstallerScript{

	function install($parent){
		$parent->getParent()->setRedirectURL('index.php?option=com_device');
	}

	function uninstall($parent){
		echo '<p>' . JText::_('COM_DEVICE_UNINSTALL_TEXT') . '</p>';
	}

	function update($parent){
		echo '<p>' . JText::_('COM_DEVICE_UPDATE_TEXT') . '</p>';
	}

	function preflight($parent){
		echo '<p>' . JText::_('COM_DEVICE_PREFLIGHT_' . $type . '_TEXT') . '</p>';
	}

	function postflight($parent){
		echo '<p>' . JText::_('COM_DEVICE_POSTFLIGHT_' . $type . '_TEXT') . '</p>';
	}
}
