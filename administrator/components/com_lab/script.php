<?php

defined('_JEXEC') or die;

class com_labInstallerScript{

	function install($parent){
		$parent->getParent()->setRedirectURL('index.php?option=com_lab');
	}

	function uninstall($parent){
		echo '<p>' . JText::_('COM_LAB_UNINSTALL_TEXT') . '</p>';
	}

	function update($parent){
		echo '<p>' . JText::_('COM_LAB_UPDATE_TEXT') . '</p>';
	}

	function preflight($parent){
		echo '<p>' . JText::_('COM_LAB_PREFLIGHT_' . $type . '_TEXT') . '</p>';
	}

	function postflight($parent){
		echo '<p>' . JText::_('COM_LAB_POSTFLIGHT_' . $type . '_TEXT') . '</p>';
	}
}
