<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('location_id')); ?>:</b>
	<?php echo CHtml::encode($data->location_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />


	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Enabled')); ?>:</b>
	<?php echo CHtml::encode($data->Enabled); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Scale9grid')); ?>:</b>
	<?php echo CHtml::encode($data->Scale9grid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Zorder')); ?>:</b>
	<?php echo CHtml::encode($data->Zorder); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Capture')); ?>:</b>
	<?php echo CHtml::encode($data->Capture); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Children')); ?>:</b>
	<?php echo CHtml::encode($data->Children); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Preload')); ?>:</b>
	<?php echo CHtml::encode($data->Preload); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Blendmode')); ?>:</b>
	<?php echo CHtml::encode($data->Blendmode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Edge')); ?>:</b>
	<?php echo CHtml::encode($data->Edge); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Ox')); ?>:</b>
	<?php echo CHtml::encode($data->Ox); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Oy')); ?>:</b>
	<?php echo CHtml::encode($data->Oy); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Zoom')); ?>:</b>
	<?php echo CHtml::encode($data->Zoom); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Distorted')); ?>:</b>
	<?php echo CHtml::encode($data->Distorted); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Rx')); ?>:</b>
	<?php echo CHtml::encode($data->Rx); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Ry')); ?>:</b>
	<?php echo CHtml::encode($data->Ry); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Rz')); ?>:</b>
	<?php echo CHtml::encode($data->Rz); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Inverserotation')); ?>:</b>
	<?php echo CHtml::encode($data->Inverserotation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Flying')); ?>:</b>
	<?php echo CHtml::encode($data->Flying); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Width')); ?>:</b>
	<?php echo CHtml::encode($data->Width); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Height')); ?>:</b>
	<?php echo CHtml::encode($data->Height); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Scale')); ?>:</b>
	<?php echo CHtml::encode($data->Scale); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Altscale')); ?>:</b>
	<?php echo CHtml::encode($data->Altscale); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Rotate')); ?>:</b>
	<?php echo CHtml::encode($data->Rotate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Smoothing')); ?>:</b>
	<?php echo CHtml::encode($data->Smoothing); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Accuracy')); ?>:</b>
	<?php echo CHtml::encode($data->Accuracy); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Alpha')); ?>:</b>
	<?php echo CHtml::encode($data->Alpha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Usecontentsize')); ?>:</b>
	<?php echo CHtml::encode($data->Usecontentsize); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Type')); ?>:</b>
	<?php echo CHtml::encode($data->Type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Meta')); ?>:</b>
	<?php echo CHtml::encode($data->Meta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Url')); ?>:</b>
	<?php echo CHtml::encode($data->Url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Ath')); ?>:</b>
	<?php echo CHtml::encode($data->Ath); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Atv')); ?>:</b>
	<?php echo CHtml::encode($data->Atv); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Onover')); ?>:</b>
	<?php echo CHtml::encode($data->Onover); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Onout')); ?>:</b>
	<?php echo CHtml::encode($data->Onout); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Onclick')); ?>:</b>
	<?php echo CHtml::encode($data->Onclick); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Crop')); ?>:</b>
	<?php echo CHtml::encode($data->Crop); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Onovercrop')); ?>:</b>
	<?php echo CHtml::encode($data->Onovercrop); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Ondowncrop')); ?>:</b>
	<?php echo CHtml::encode($data->Ondowncrop); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Scalechildren')); ?>:</b>
	<?php echo CHtml::encode($data->Scalechildren); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Mask')); ?>:</b>
	<?php echo CHtml::encode($data->Mask); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Effect')); ?>:</b>
	<?php echo CHtml::encode($data->Effect); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Onhover')); ?>:</b>
	<?php echo CHtml::encode($data->Onhover); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Ondown')); ?>:</b>
	<?php echo CHtml::encode($data->Ondown); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Onup')); ?>:</b>
	<?php echo CHtml::encode($data->Onup); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Onloaded')); ?>:</b>
	<?php echo CHtml::encode($data->Onloaded); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Altonloaded')); ?>:</b>
	<?php echo CHtml::encode($data->Altonloaded); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Handcursor')); ?>:</b>
	<?php echo CHtml::encode($data->Handcursor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Style')); ?>:</b>
	<?php echo CHtml::encode($data->Style); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Effects')); ?>:</b>
	<?php echo CHtml::encode($data->Effects); ?>
	<br />

	*/ ?>

</div>