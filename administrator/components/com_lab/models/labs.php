<?php

defined('_JEXEC') or die;

class LabModelLabs extends JModelList{
	public function __construct($config = array()){
		if(empty($config['filter_fields'])){
			$config['filter_fields'] = array(
				'id', 'a.id',
				'labname', 'a.labname',
				'lno','a.lno',
				'place','a.place',
				'pnumber','a.pnumber',
				'admin','a.admin',
				'pic','a.pic',
				'phone','a.phone',
				'email','a.email',
				'booktime','a.booktime',
				'bookday','a.bookday',
				'opendate','a.opendate',
				'closedate','a.closedate',
				'publish_up','a.publish_up',
				'publish_down','a.publish_down',
				'state','a.state',
			);
		}
		parent::__construct($config);
	}

	protected function populateState($ordering = null, $direction = null){
		$search = $this->getUserStateFromRequest($this->context.'.filter.search','filter_search');
		$this->setState('filter.search',$search);

		$published = $this->getUserStateFromRequest($this->context.'.filter.state',
		'filter_state','','string');
		$this->setState('filter.state',$published);

		parent::populateState('a.lno', 'asc');
	}
	protected function getListQuery(){
		$db = $this->getDbo();
		$query = $db->getQuery(true);

		$query->select(
			$this->getState(
				'list.select',
				'a.id,a.labname,a.lno,a.place,a.pnumber,a.admin,a.phone,a.booktime,a.bookday,' .
				'a.opendate,a.closedate,a.state,a.publish_up,a.publish_down'
			)
		);
		$query->from($db->quoteName('#__lab') . ' As a');

		$published = $this->getState('filter.state');
		if(is_numeric($published)){
			$query->where('a.state = '.(int)$published);
		}else if($published === ''){
			$query->where('(a.state IN (0,1))');
		}

		//filter by search in title
		$search = $this->getState('filter.search');
		if(!empty($search)){
			if(stripos($search, 'lno:') === 0){
				$query->where('a.lno = '.(int)substr($search, 4));
			}else{
				$search = $db->Quote('%'.$db->escape($search, true).'%');
				$query->where('(a.labname LIKE '.$search.')');
			}
		}

		$orderCol = $this->state->get('list.ordering');
		$orderDirn = $this->state->get('list.direction');
		$query->order($db->escape($orderCol . ' ' . $orderDirn));
		return $query;
	}
}

