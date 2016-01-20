<?php

defined('_JEXEC') or die;

class LabViewLabs extends JViewLegacy{
	protected $items;

	public function display($tpl = null){
		$this->items = $this->get('Items');

		if(count($errors = $this->get('Errors'))){
			JError::raiseError(500, implode("\n", $errors));
		}

		$this->addToolbar();
		parent::display($tpl);
	}

	protected function addToolbar(){
		$canDo = LabHelper::getActions();
		$bar = JToolBar::getInstance('toolbar');

		JToolbarHelper::title(JText::_('COM_LAB_MANAGER_LABS'), '');
		JToolbarHelper::addNew('lab.add');

		if($canDo->get('core.edit')){
			JToolbarHelper::editList('lab.edit');
		}

		if($canDo->get('core.admin')){
			JToolbarHelper::preferences('com_lab');
		}
	}
}

