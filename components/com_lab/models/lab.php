<?php

defined('_JEXEC') or die;

class LabModelLab extends JModelList{
	public function __construct($config = array()){
		if(empty($config['filter_fields'])){
			$config['filter_fields'] = array(
			'id','a.id',
			'lno','a.lno',
			'labname','labname',
			'pic','a.pic',
			'state','a.state',
			'admin','a.admin',
			'phone','a.phone',
			'description','a.description'
			);
		}
		parent::__construct($config);
	}

	protected function populateState($ordering = null,$direction = null){
		$id = JRequest::getInt('id');
		$this->setState('id', $id);
	}

	protected function getListQuery(){
		$db = $this->getDbo();
		$query = $db->getQuery(true);

		$query->select(
			$this->getState(
				'list.select',
				'a.id,a.lno,a.labname,a.state,a.pic,' .
				'a.admin,a.phone,a.description'
			)
		);
		$query->from($db->quoteName('#__lab') . ' AS a');

		$query->where('(a.state IN (1))');
		//$query->where("a.pic NOT LIKE ''");
		if($id = $this->getState('id')){
			$query->where('a.id = ' . (int)$id);
		}

		return $query;
	}
}

