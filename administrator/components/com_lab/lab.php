<?php

defined('_JEXEC') or die;

if(!JFactory::getUser()->authorise('core.manage','com_lab')){
	return JError::raiseWarning(404,JText::_('JError_ALERTNOAUTHOR'));
}

$controller = JControllerLegacy::getInstance('Lab');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();

