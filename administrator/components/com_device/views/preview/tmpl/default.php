<?php

defined('_JEXEC') or die;

?>

<form action="<?php echo JRoute::_('index.php?option=com_device&view=devices') ?>" 
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
			<div class="mydevice">
				
				<div class="device_devicename">
					<strong><?php echo $item->devicename; ?></strong>
				</div>

				<div class="device_element">
					<img src="../<?php echo $item->pic ?>" alt="" width="150px">
				</div>
				
				<div class="device_devicename">
					<?php echo JText::_('COM_DEVICE_FIELD_DNO_LABEL') ?>:
					<strong><?php echo $item->dno; ?></strong>
				</div>

				<div class="device_element">
					<?php echo JText::_('COM_DEVICE_FIELD_ADMIN_LABEL') ?>:
					<strong><?php echo $item->admin; ?></strong>
				</div>

				<div class="device_element">
					<?php echo JText::_('COM_DEVICE_FIELD_PHONE_LABEL') ?>:
					<strong><?php echo $item->phone; ?></strong>
				</div>

				<div class="device_element">
					<?php echo JText::_('JGLOBAL_DESCRIPTION') ?>:
					<?php echo $item->description; ?>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
	</div>
</form>

