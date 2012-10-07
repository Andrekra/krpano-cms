<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('name')); ?>:
	<?php echo GxHtml::encode($data->name); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('description')); ?>:
	<?php echo GxHtml::encode($data->description); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('keywords')); ?>:
	<?php echo GxHtml::encode($data->keywords); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('default_location_id')); ?>:
	<?php echo GxHtml::encode($data->default_location_id); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('progress_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->progress)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('autorotate_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->autorotate)); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('control_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->control)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('display_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->display)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('memory_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->memory)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('network_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->network)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('user_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->user)); ?>
	<br />
	*/ ?>

</div>