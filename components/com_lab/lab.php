<?php

defined('_JEXEC') or die;

$document = JFactory::getDocument();
$cssFile = "./media/com_lab/css/site.stylesheet.css";
$document->addStyleSheet($cssFile);

$controller = JControllerLegacy::getInstance('Lab');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();

