<?php

//新建或者修改数据的页面
defined('_JEXEC') or die;

class DeviceViewDevice extends JViewLegacy{
	protected $item;								//存储从数据库获取的数据
	protected $form;								//创建表单

	public function display($tpl = null){
		$this->item = $this->get('Item');			//提取data
		$this->form = $this->get('Form');			//显示表单

		if(count($errors = $this->get('Errors'))){
			JError::raiseError(500, implode("\n", $errors));
			return false;
		}

		$this->addToolbar();
		parent::display($tpl);
	}

	protected function addToolbar(){
		JFactory::getApplication()->input->set('hidemainmenu', true);

		JToolbarHelper::title(JText::_('COM_DEVICE_MANAGER_DEVICE'), '');

		JToolbarHelper::save('device.save');

		if(empty($this->item->id)){
			JToolbarHelper::cancel('device.cancel');
		}
		else{
			JToolbarHelper::cancel('device.cancel', 'JTOOLBAR_CLOSE');
		}
		
	}
}

