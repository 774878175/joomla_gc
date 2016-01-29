<?php

defined('_JEXEC') or die;

class LabModelPreview extends JModelList{
	public function __construct($config = array()){
		if(empty($config['filter_fields'])){
			$config['filter_fields'] = array(
				'lno','a.lno',
				'labname', 'a.labname',
				'admin','a.admin',
				'pic','a.pic',
				'phone','a.phone',
				'state','a.state',
				'description','a.description'
			);
		}
		parent::__construct($config);
	}

	protected function getListQuery(){
		$db = $this->getDbo();
		$query = $db->getQuery(true);

		$query->select(
			$this->getState(
				'list.select',
				'a.lno,a.labname,a.admin,a.pic,a.phone,a.state,a.description'
			)
		);
		$query->from($db->quoteName('#__lab') . ' As a');

		$query->where('(a.state IN (1))');

		$query->where('a.pic !=""');
		$query->order($db->escape('a.lno asc'));
		return $query;
	}
}

