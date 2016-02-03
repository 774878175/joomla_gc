<?php

defined('_JEXEC') or die;

class DeviceModelDevice extends JModelAdmin{
	protected $text_prefix = 'COM_DEVICE';

	public function getTable($type='Device', $prefix='DeviceTable', $config=array()){
		return JTable::getInstance($type, $prefix, $config);
	}

	public function getForm($data=array(), $loadData = true){
		$app = JFactory::getApplication();

		$form = $this->loadForm('com_device.device', 'device', 
		array('control'=>'jform', 'load_data'=>$loadData));
		if(empty($form)){
			return false;
		}
		return $form;
	}

	protected function loadFormData(){
		$data = JFactory::getApplication()->getUserState('com_device.edit.device.data', array());

		if(empty($data)){
			$data = $this->getItem();
		}

		return $data;
	}

	protected function prepareTable($table){
		$table->devicename = htmlspecialchars_decode($table->devicename, ENT_QUOTES);
	}

	/*public function save($data){
		parent::save($data);
		return true;
	}*/
}

