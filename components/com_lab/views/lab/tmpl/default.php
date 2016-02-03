<?php

defined('_JEXEC') or die;
?>

<div class="myview">
	<?php foreach($this->items as $item): ?>
		<div class="mylab">
			<div class="lab_labname">
				<?php echo $item->labname ?>
			</div>
			<div class="lab_element">
				<img src="<?php echo $item->pic ?>" alt="" width="150">
			</div>
			<div class="lab_element">
				<?php echo JText::_('COM_LAB_LNO') ?>
				<strong><?php echo $item->lno ?></strong>
			</div>
			<div class="lab_element">
				<?php echo JText::_('COM_LAB_ADMIN') ?>
				<strong><?php echo $item->admin ?></strong>
			</div>
			<div class="lab_element">
				<?php echo JText::_('COM_LAB_PHONE') ?>
				<strong><?php echo $item->phone ?></strong>
			</div>
			<div class="lab_element">
				<?php echo JText::_('COM_LAB_DESCRIPTION') ?>
				<?php echo $item->description ?>
			</div>
		</div>
	<?php endforeach; ?>
</div>

		