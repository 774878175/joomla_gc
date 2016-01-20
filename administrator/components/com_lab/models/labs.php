<?php

defined('_JEXEC') or die;

class LabModelLabs extends JModelList{
	public function __construct($config = array()){
		if(empty($config['filter_fields'])){
			$config['filter_fields'] = array(
				'lid', 'a.lid',
				'labname', 'a.labname',
				'lno','a.lno',
				'place','a.place',
				'pnumber','a.pnumber',
				'admin','a.admin',
				'tel','a.tel',
				'booktime','a.booktime',
				'bookday','a.bookday',
				'opendate','a.opendate',
				'closedate','a.closedate',
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
				'a.lid,a.labname,a.lno,a.place,a.pnumber,a.admin,a.tel,a.booktime,a.bookday,a.opendate,a.closedate'
			)
		);
		$query->from($db->quoteName('#__lab') . 'As a');
		return $query;
	}
}

