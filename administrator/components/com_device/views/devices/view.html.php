<?php

defined('_JEXEC') or die;

class DeviceViewDevices extends JViewLegacy{
	protected $items;
	protected $state;
	protected $pagination;

	public function display($tpl = null){
		$this->items = $this->get('Items');
		$this->state = $this->get('State');
		$this->pagination = $this->get('Pagination');

		DeviceHelper::addSubmenu('devices');
		
		if(count($errors = $this->get('Errors'))){
			JError::raiseError(500, implode("\n", $errors));
			return false;
		}

		$this->addToolbar();
		$this->sidebar = JHtmlSidebar::render();
		parent::display($tpl);
	}

	protected function addToolbar(){
		$canDo = DeviceHelper::getActions();
		$bar = JToolBar::getInstance('toolbar');

		JToolbarHelper::title(JText::_('COM_DEVICE_MANAGER_DEVICES'), 'folder categories');
		JToolbarHelper::addNew('device.add');

		if($canDo->get('core.edit')){
			JToolbarHelper::editList('device.edit');
		}

		if($canDo->get('core.edit.state')){
			JToolbarHelper::publish('devices.publish', 'JTOOLBAR_PUBLISH', true);
			JToolbarHelper::unpublish('devices.unpublish', 'JTOOLBAR_UNPUBLISH', true);
			JToolbarHelper::archiveList('devices.archive');
			JToolbarHelper::checkin('devices.checkin');
		}

		/*将信息直接删除
		if($canDo->get('core.delete')){
			JToolbarHelper::deleteList('', 'labs.delete', 'JTOOLBAR_DELETE');
		}*/

		$state = $this->get('State');
		if($state->get('filter.state')==-2 && $canDo->get('core.delete')){
			JToolbarHelper::deleteList('', 'devices.delete', 'JTOOLBAR_EMPTY_TRASH');
		}else if($canDo->get('core.edit.state')){
			JToolbarHelper::trash('devices.trash');
		}

		if($canDo->get('core.admin')){
			JToolbarHelper::preferences('com_device');
		}
		
		JHtmlSidebar::setAction('index.php?option=com_device&view=devices');

		JHtmlSidebar::addFilter(
			JText::_('JOPTION_SELECT_PUBLISHED'),
			'filter_state',
			JHtml::_('select.options', JHtml::_('jgrid.publishedOptions'),
			'value', 'text', $this->state->get('filter.state'),true)
		);
	}

	protected function getSortFields(){
		return array(
		'a.devicename' => Jtext::_('COM_DEVICE_FIELD_DEVICENAME_LABEL'),
		'a.dno' => JText::_('COM_DEVICE_FIELD_DNO_LABEL')
		);
	}
}

