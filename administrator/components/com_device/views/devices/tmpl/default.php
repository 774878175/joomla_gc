<?php

defined('_JEXEC') or die;

$user = JFactory::getUser();
$listOrder = $this->escape($this->state->get('list.ordering'));
$listDirn = $this->escape($this->state->get('list.direction'));
$sortFields = $this->getSortFields();
?>

<script type="text/javascript">
	Joomla.orderTable = function(){
		table = document.getElementById("sortTable");
		direction = document.getElementById("directionTable");
		order = table.options[table.selectedIndex].value;
		if(order != '<?php echo $listOrder; ?>'){
			dirn = 'asc';
		}else{
			dirn = direction.options[direction.selectedIndex].value;
		}
		Joomla.tableOrdering(order,dirn,'');
	}
</script>

<form action="<?php echo JRoute::_('index.php?option=com_device&view=devices') ?>" 
	method="post" name="adminForm" id="adminForm">
	<?php if(!empty($this->sidebar)): ?>
		<div id="j-sidebar-container" class="span2">
			<?php echo $this->sidebar; ?>
		</div>
		<div id="j-main-container" class="span10">
	<?php else: ?>
		<div id="j-main-container">
	<?php endif; ?>

	<div id="filter-bar" class="btn-toobar">
		<div class="filter-search btn-group pull-left">
			<label for="filter_search" class="element-invisible">
				<?php echo JText::_('COM_DEVICE_SEARCH_IN_TITLE') ?>
			</label>
			<input type="text" name="filter_search" id="filter_search" placeholder="<?php 
			echo JText::_('COM_DEVICE_SEARCH_IN_TITLE') ?>" 
			value="<?php echo $this->escape($this->state->get('filter_search')) ?>"
			title="<?php echo JText::_('COM_DEVICE_SEARCH_IN_TITLE') ?>" />
		</div>
		<div class="btn-group pull-left">
			<button class="btn hasTooltip" type="submit" title="<?php echo 
			JText::_('JSEARCH_FILTER_SUBMIT') ?>">
			<i class="icon-search"></i>
			</button>
			<button class="btn hasTooltip" type="reset" title="<?php echo 
			 JText::_('JSEARCH_FILTER_CLEAR') ?>"
			 onclick="document.id('filter_search').value='';this.form.submit();">
			<i class="icon-remove"></i>
			</button>
		</div>
		<div class="btn-group pull-right hidden-phone">
			<label for="limit" class="element-invisible">
				<?php echo JText::_('JFILED_PLG_SEARCH_SEARCHLIMIT_DESC') ?>
			</label>
			<?php echo $this->pagination->getLimitBox(); ?>
		</div>
		<div class="btn-group pull-right hidden-phone">
			<label for="directionTable" class="element-invisible">
				<?php echo JText::_('JFILED_ORDERING_DESC') ?>
			</label>
			<select name="directionTable" id="directionTable" class="input-medium" onchange="Joomla.orderTable()">
				<option value="asc" <?php 
				if($listDirn == 'asc') echo 'selected="select"' ?> >
				<?php echo JText::_('JGLOBAL_ORDER_ASCENDING'); ?></option>
				<option value="desc" <?php if($listDirn == 'desc') echo 'selected="selected"' ?>>
				<?php echo JText::_('JGLOBAL_ORDER_DESCENDING') ?></option>
			</select>
		</div>
		<div class="btn-group pull-right hidden-phone">
			<label for="sortTable" class="element-invisible">
				<?php echo JText::_('JGLOBAL_SORT_BY') ?>
			</label>
			<select name="sortTable" id="sortTable" class="input-medium" onchange="Joomla.orderTable()">
				<option value=""><?php echo JText::_('JGLOBAL_SORT_BY') ?></option>
				<?php echo JHtml::_('select.options', $sortFields, 'value', 'text', $listOrder) ?>
			</select>
		</div>
	</div>

		<div class="clearfix"></div>
		<table class="table table-striped" id="deviceList">
			<thead>
				<tr>
					<th width="1%" class="hidden-phone">
						<input type="checkbox" name="checkall-toggle" value="" 
						title="<?php  echo JText::_('JGLOBAL_CHECK_ALL'); ?>"
						onclick="Joomla.checkAll(this)"/>
					</th>
					<th class="nowrap" align="left">
						<?php echo JHtml::_('grid.sort', '实验仪器名称', 'a.devicename', $listDirn, $listOrder ) ?>
					</th>
					<th class="nowrap" align="left"  style="min-width:55px">
						<?php echo JHtml::_('grid.sort', '编号', 'a.lno', $listDirn, $listOrder ) ?>
					</th>
					<th class="nowrap" align="left"  style="min-width:55px">
						<?php echo JHtml::_('grid.sort', '所属实训室', 'a.lno', $listDirn, $listOrder ) ?>
					</th>
					<th class="nowrap" align="left">
						<?php echo JHtml::_('grid.sort','状态','a.state',$listDirn,$listOrder) ?>
					</th>
					<th class="nowrap hidden-phone" align="left">
						<?php echo JHtml::_('grid.sort', '负责人', 'a.admin', $listDirn, $listOrder ) ?>
					</th>
					<th class="nowrap hidden-phone" align="left">
						<?php echo JHtml::_('grid.sort', '联系电话', 'a.phone', $listDirn, $listOrder ) ?>
					</th>
					<th class="nowrap hidden-phone" align="left">
						<?php echo JHtml::_('grid.sort', '预约时段', 'a.booktime', $listDirn, $listOrder ) ?>
					</th>
					<th class="nowrap hidden-phone" align="left">
						<?php echo JHtml::_('grid.sort', '预约时间', 'a.bookday', $listDirn, $listOrder ) ?>
					</th>
					<th class="nowrap hidden-phone" align="left">
						<?php echo JHtml::_('grid.sort', '开放日期', 'a.opendate', $listDirn, $listOrder ) ?>
					</th>
					<th class="nowrap hidden-phone" align="left">
						<?php echo JHtml::_('grid.sort', '关闭日期', 'a.closedate', $listDirn, $listOrder ) ?>
					</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<td colspan="10">
						<?php echo $this->pagination->getListFooter(); ?>
					</td>
				</tr>
			</tfoot>
			<tbody>
				<?php foreach($this->items as $i=>$item): 
					$canCheckin = $user->authorise('core.manage', 'com_checkin') ||
					$item->checked_out = $user->get('id') ||
					$item->checked_out == 0;
					$canChange = $user->authorise('core.edit.state', 'com_device') && $canCheckin;
					?>
				<tr class="row<?php echo $i%2;?>">
					<td class="left hidden-phone">
						<?php echo JHtml::_('grid.id', $i, $item->id); ?>
					</td>

					<td class="nowrap has-context">
						<a href="<?php echo JRoute::_('index.php?option=com_device&
						task=device.edit&id=' . (int)$item->id); ?>">
						<?php echo $this->escape($item->devicename); ?>
						</a>
					</td>

					<td class="nowrap has-context">
						<?php echo $this->escape($item->dno); ?>
					</td>

					<td class="nowrap has-context">
						<?php echo $this->escape($item->labname); ?>
					</td>

					<td class="nowrap has-context">
						<?php echo JHtml::_('jgrid.published',$item->state,$i,'devices.',$canChange,'cb',
						$item->publish_up,$item->publish_down) ?>
					</td>

					<td class="nowrap has-context">
						<?php echo $this->escape($item->admin); ?>
					</td>

					<td class="nowrap has-context">
						<?php echo $this->escape($item->phone); ?>
					</td>

					<td class="nowrap has-context">
						<?php echo $this->escape($item->booktime); ?>
					</td>

					<td class="nowrap has-context">
						<?php echo $this->escape($item->bookday); ?>
					</td>

					<td class="nowrap has-context">
						<?php echo $this->escape($item->opendate); ?>
					</td>

					<td class="nowrap has-context">
						<?php echo $this->escape($item->closedate); ?>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>

		<input type="hidden" name="task" value="" />
		<input type="hidden" name="boxchecked" value="0" />
		<input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
		<input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
</form>