<?php

defined('_JEXEC') or die;

class LabModelLab extends JModelAdmin{
	protected $text_prefix = 'COM_LAB';

	public function getTable($type='Lab', $prefix='LabTable', $config=array()){
		return JTable::getInstanse($type, $prefix, $config);
	}

	public function getForm($data=array(), $loadData = true){
		$app = JFactory::getApplication();

		$form = $this->loadForm('com_lab.lab', 'lab', 
		array('control'=>'jform', 'load_data'=>$loadData));
		if(empty($form)){
			return false;
		}
		return $form;
	}

	protected function loadFormData(){
		$data = JFactory::getApplication()->getUserState('com_lab.edit.lab.data', array());

		if(empty($data)){
			$data = $this->getItem();
		}

		return $data;
	}

	protected function prepareTable($table){
		$table->labname = htmlspecialchars_decode($table->labname, ENT_QUOTES);
	}
}

