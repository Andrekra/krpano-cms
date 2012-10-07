<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('LocationId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->LocationId), array('view', 'id'=>$data->LocationId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Name')); ?>:</b>
	<?php echo CHtml::encode($data->Name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ProjectId')); ?>:</b>
	<?php echo CHtml::encode($data->ProjectId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Thumbnail')); ?>:</b>
	<?php echo CHtml::encode($data->Thumbnail); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('krpano_image_id')); ?>:</b>
	<?php echo CHtml::encode($data->krpano_image_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('krpano_preview_id')); ?>:</b>
	<?php echo CHtml::encode($data->krpano_preview_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('krpano_view_id')); ?>:</b>
	<?php echo CHtml::encode($data->krpano_view_id); ?>
	<br />


</div>