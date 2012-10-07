<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category')); ?>:</b>
	<?php echo CHtml::encode($data->category); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('property')); ?>:</b>
	<?php echo CHtml::encode($data->property); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('example')); ?>:</b>
	<?php echo CHtml::encode($data->example); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('input_type')); ?>:</b>
	<?php echo CHtml::encode($data->input_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('input_options')); ?>:</b>
	<?php echo CHtml::encode($data->input_options); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('read_only')); ?>:</b>
	<?php echo CHtml::encode($data->read_only); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('min')); ?>:</b>
	<?php echo CHtml::encode($data->min); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('max')); ?>:</b>
	<?php echo CHtml::encode($data->max); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('step')); ?>:</b>
	<?php echo CHtml::encode($data->step); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('default')); ?>:</b>
	<?php echo CHtml::encode($data->default); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ipad_compatible')); ?>:</b>
	<?php echo CHtml::encode($data->ipad_compatible); ?>
	<br />

	*/ ?>

</div>