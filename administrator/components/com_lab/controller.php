<?php

defined('_JEXEC') or die;

class LabController extends JControllerLegacy{
	protected $default_view = 'labs';

	public function display($cachable = false, $urlparams = false){
		require_once JPATH_COMPONENT . '/helpers/lab.php';

		$view = $this->input->get('view', 'labs');
		$layout = $this->input->get('layout', 'default');
		$id = $this->input->getInt('lid');

		if($view == 'lab' && $layout == 'edit' && !$this->checkEditId('com_lab.edit.lab', $id)){
			$this->setError(JText::sprintf('JLIB_APPLICATION_ERROR_UNHELD_ID', $id));
			$this->setMessage($this->getError(), 'error');
			$this->setRedirect(JRoute::_('index.php?option=com_lab&view=labs', false));

			return false;
		}

		parent::display();
		return $this;
	}
}

	