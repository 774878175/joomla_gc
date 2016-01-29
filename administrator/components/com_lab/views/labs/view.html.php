<?php

defined('_JEXEC') or die;

class LabViewLabs extends JViewLegacy{
	protected $items;
	protected $state;
	protected $pagination;

	public function display($tpl = null){
		$this->items = $this->get('Items');
		$this->state = $this->get('State');
		$this->pagination = $this->get('Pagination');

		LabHelper::addSubmenu('labs');
		
		if(count($errors = $this->get('Errors'))){
			JError::raiseError(500, implode("\n", $errors));
		}

		$this->addToolbar();
		$this->sidebar = JHtmlSidebar::render();
		parent::display($tpl);
	}

	protected function addToolbar(){
		$canDo = LabHelper::getActions();
		$bar = JToolBar::getInstance('toolbar');

		JToolbarHelper::title(JText::_('COM_LAB_MANAGER_LABS'), 'folder categories');
		JToolbarHelper::addNew('lab.add');

		if($canDo->get('core.edit')){
			JToolbarHelper::editList('lab.edit');
		}

		if($canDo->get('core.edit.state')){
			JToolbarHelper::publish('labs.publish', 'JTOOLBAR_PUBLISH', true);
			JToolbarHelper::unpublish('labs.unpublish', 'JTOOLBAR_UNPUBLISH', true);
			JToolbarHelper::archiveList('labs.archive');
			JToolbarHelper::checkin('labs.checkin');
		}

		/*将信息直接删除
		if($canDo->get('core.delete')){
			JToolbarHelper::deleteList('', 'labs.delete', 'JTOOLBAR_DELETE');
		}*/

		$state = $this->get('State');
		if($state->get('filter.state')==-2 && $canDo->get('core.delete')){
			JToolbarHelper::deleteList('', 'labs.delete', 'JTOOLBAR_EMPTY_TRASH');
		}else if($canDo->get('core.edit.state')){
			JToolbarHelper::trash('labs.trash');
		}

		if($canDo->get('core.admin')){
			JToolbarHelper::preferences('com_lab');
		}
		
		JHtmlSidebar::setAction('index.php?option=com_lab&view=labs');

		JHtmlSidebar::addFilter(
			JText::_('JOPTION_SELECT_PUBLISHED'),
			'filter_state',
			JHtml::_('select.options', JHtml::_('jgrid.publishedOptions'),
			'value', 'text', $this->state->get('filter.state'),true)
		);
	}

	protected function getSortFields(){
		return array(
		'a.labname' => Jtext::_('COM_LAB_FIELD_LABNAME_LABEL'),
		'a.lno' => JText::_('COM_LAB_FIELD_LNO_LABEL')
		);
	}
}

