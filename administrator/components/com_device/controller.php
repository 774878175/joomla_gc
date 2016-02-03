<?php

defined('_JEXEC') or die;

class DeviceController extends JControllerLegacy{
	protected $default_view = 'devices';

	public function display($cachable = false, $urlparams = false){
		require_once JPATH_COMPONENT . '/helpers/device.php';

		$view = $this->input->get('view', 'devices');
		$layout = $this->input->get('layout', 'default');
		$id = $this->input->getInt('id');

		if($view == 'device' && $layout == 'edit' && !$this->checkEditId('com_device.edit.device', $id)){
			$this->setError(JText::sprintf('JLIB_APPLICATION_ERROR_UNHELD_ID', $id));
			$this->setMessage($this->getError(), 'error');
			$this->setRedirect(JRoute::_('index.php?option=com_device&view=devices', false));

			return false;
		}

		parent::display();
		return $this;
	}
}

	