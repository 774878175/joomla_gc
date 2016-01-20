<?php

defined('_JEXEC') or die;

$listOrder = '';
$listDirn = '';
?>

<form action="<?php echo JRoute::_('index.php?option=com_lab&view=labs') ?>" 
	method="post" name="adminForm" id="adminForm">
	<div id="j-main-container" class="span10">
		<div class="clearfix"></div>
		<table class="table table-striped" id="labList">
			<thead>
				<tr>
					<th width="1%" class="hidden-phone">
						<input type="checkbox" name="checkall-toggle" value="" 
						title="<?php  echo JText::_('JGLOBAL_CHECK_ALL'); ?>"
						onclick="Joomla.checkAll(this)"/>
					</th>
					<th class="title" align="left">
						<?php echo JHtml::_('grid.sort', '实训室名称', 'a.labname', $listDirn, $listOrder ) ?>
					</th>
					<th class="title" align="left">
						<?php echo JHtml::_('grid.sort', '编号', 'a.lno', $listDirn, $listOrder ) ?>
					</th>
					<th class="title" align="left">
						<?php echo JHtml::_('grid.sort', '地点', 'a.place', $listDirn, $listOrder ) ?>
					</th>
					<th class="title" align="left">
						<?php echo JHtml::_('grid.sort', '人数限制', 'a.pnumber', $listDirn, $listOrder ) ?>
					</th>
					<th class="title" align="left">
						<?php echo JHtml::_('grid.sort', '负责人', 'a.admin', $listDirn, $listOrder ) ?>
					</th>
					<th class="title" align="left">
						<?php echo JHtml::_('grid.sort', '联系电话', 'a.tel', $listDirn, $listOrder ) ?>
					</th>
					<th class="title" align="left">
						<?php echo JHtml::_('grid.sort', '预约时段', 'a.booktime', $listDirn, $listOrder ) ?>
					</th>
					<th class="title" align="left">
						<?php echo JHtml::_('grid.sort', '预约时间', 'a.bookday', $listDirn, $listOrder ) ?>
					</th>
					<th class="title" align="left">
						<?php echo JHtml::_('grid.sort', '开放日期', 'a.opendate', $listDirn, $listOrder ) ?>
					</th>
					<th class="title" align="left">
						<?php echo JHtml::_('grid.sort', '关闭日期', 'a.closedate', $listDirn, $listOrder ) ?>
					</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($this->items as $i=>$item): ?>
				<tr class="row<?php echo $i%2;?>">
					<td class="center hidden-phone">
						<?php echo JHtml::_('grid.id', $i, $item->lid); ?>
					</td>

					<td class="nowrap has-context">
						<a href="<?php echo JRoute::_('index.php?option=com_lab&
						task=lab.edit&id=' . (int)$item->lid); ?>">
						<?php echo $this->escape($item->labname); ?>
						</a>
					</td>

					<td class="nowrap has-context">
						<?php echo $this->escape($item->lno); ?>
					</td>

					<td class="nowrap has-context">
						<?php echo $this->escape($item->place); ?>
					</td>
					
					<td class="nowrap has-context">
						<?php echo $this->escape($item->pnumber); ?>
					</td>

					<td class="nowrap has-context">
						<?php echo $this->escape($item->admin); ?>
					</td>

					<td class="nowrap has-context">
						<?php echo $this->escape($item->tel); ?>
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