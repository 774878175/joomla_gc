<?php

defined('_JEXEC') or die;

?>

<form action="<?php echo JRoute::_('index.php?option=com_lab&view=labs') ?>" 
	method="post" name="adminForm" id="adminForm">
<?php if(!empty($this->sidebar)): ?>
	<div id="j-sidebar-container" class="span2">
		<?php echo $this->sidebar ?>
	</div>
	<div class="span10" id="j-main-container">
<?php endif; ?>
	<div class="clearfix"></div>
	<div class="mypreview">
		<?php foreach($this->items as $i=>$item): ?>
			<div class="mylab">
				
				<div class="lab_labname">
					<strong><?php echo $item->labname; ?></strong>
				</div>

				<div class="lab_element">
					<img src="../<?php echo $item->pic ?>" alt="" width="150px">
				</div>
				
				<div class="lab_labname">
					<?php echo JText::_('COM_LAB_FIELD_LNO_LABEL') ?>:
					<strong><?php echo $item->lno; ?></strong>
				</div>

				<div class="lab_element">
					<?php echo JText::_('COM_LAB_FIELD_ADMIN_LABEL') ?>:
					<strong><?php echo $item->admin; ?></strong>
				</div>

				<div class="lab_element">
					<?php echo JText::_('COM_LAB_FIELD_PHONE_LABEL') ?>:
					<strong><?php echo $item->phone; ?></strong>
				</div>

				<div class="lab_element">
					<?php echo JText::_('JGLOBAL_DESCRIPTION') ?>:
					<?php echo $item->description; ?>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
	</div>
</form>

