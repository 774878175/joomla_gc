<?php

defined('_JEXEC') or die;

class LabViewPreview extends JViewLegacy{
	protected $items;

	public function display($tpl = null){
		$this->items = $this->get('Items');

		LabHelper::addSubmenu('preview');

		if(count($errors = $this->get('Errors'))){
			JError::raiseError(500, implode("\n", $errors));
			return false;
		}
		$this->addToolbar();

		$j3css = "
		div#toolbar div#toolbar-back button.btn span.icon-back::before{
			content: \"\";
		}
		.lab_title{
			color: #555555;
			font-family: 'Titillium Maps',Arial;
			font-size: 14pt;
		}
		.mylab{
			padding-bottom: 20px;
			float:left;
			padding-right:20px;
		}
		.lab_element{
			width: 150px;
			padding-top: 2px;
		}";

		JFactory::getDocument()->addStyleDeclaration($j3css);
		//$this->sidebar = JHtmlSidebar::render();

		parent::display($tpl);
	}

	protected function addToolbar(){
		$state = $this->get('State');
		$canDo = LabHelper::getActions();
		$bar = JToolBar::getInstance('toolbar');

		JToolbarHelper::title(JText::_('COM_LAB_MANAGER_LABS'),'');
		JToolbarHelper::back('COM_LAB_BUTTON_BACK','index.php?option=com_lab');
	}
}


