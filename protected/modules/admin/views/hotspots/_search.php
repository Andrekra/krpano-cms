<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'HotspotId'); ?>
		<?php echo $form->textField($model,'HotspotId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'LocationId'); ?>
		<?php echo $form->textField($model,'LocationId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Name'); ?>
		<?php echo $form->textField($model,'Name',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Alturl'); ?>
		<?php echo $form->textField($model,'Alturl',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Keep'); ?>
		<?php echo $form->textField($model,'Keep',array('size'=>0,'maxlength'=>0)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Devices'); ?>
		<?php echo $form->textField($model,'Devices',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Visible'); ?>
		<?php echo $form->textField($model,'Visible',array('size'=>0,'maxlength'=>0)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Enabled'); ?>
		<?php echo $form->textField($model,'Enabled',array('size'=>0,'maxlength'=>0)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Scale9grid'); ?>
		<?php echo $form->textField($model,'Scale9grid',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Zorder'); ?>
		<?php echo $form->textField($model,'Zorder'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Capture'); ?>
		<?php echo $form->textField($model,'Capture',array('size'=>0,'maxlength'=>0)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Children'); ?>
		<?php echo $form->textField($model,'Children',array('size'=>0,'maxlength'=>0)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Preload'); ?>
		<?php echo $form->textField($model,'Preload',array('size'=>0,'maxlength'=>0)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Blendmode'); ?>
		<?php echo $form->textField($model,'Blendmode',array('size'=>0,'maxlength'=>0)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Edge'); ?>
		<?php echo $form->textField($model,'Edge',array('size'=>0,'maxlength'=>0)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Ox'); ?>
		<?php echo $form->textField($model,'Ox',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Oy'); ?>
		<?php echo $form->textField($model,'Oy',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Zoom'); ?>
		<?php echo $form->textField($model,'Zoom',array('size'=>0,'maxlength'=>0)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Distorted'); ?>
		<?php echo $form->textField($model,'Distorted',array('size'=>0,'maxlength'=>0)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Rx'); ?>
		<?php echo $form->textField($model,'Rx'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Ry'); ?>
		<?php echo $form->textField($model,'Ry'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Rz'); ?>
		<?php echo $form->textField($model,'Rz'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Inverserotation'); ?>
		<?php echo $form->textField($model,'Inverserotation',array('size'=>0,'maxlength'=>0)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Flying'); ?>
		<?php echo $form->textField($model,'Flying'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Width'); ?>
		<?php echo $form->textField($model,'Width',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Height'); ?>
		<?php echo $form->textField($model,'Height',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Scale'); ?>
		<?php echo $form->textField($model,'Scale'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Altscale'); ?>
		<?php echo $form->textField($model,'Altscale'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Rotate'); ?>
		<?php echo $form->textField($model,'Rotate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Smoothing'); ?>
		<?php echo $form->textField($model,'Smoothing',array('size'=>0,'maxlength'=>0)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Accuracy'); ?>
		<?php echo $form->textField($model,'Accuracy',array('size'=>0,'maxlength'=>0)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Alpha'); ?>
		<?php echo $form->textField($model,'Alpha'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Usecontentsize'); ?>
		<?php echo $form->textField($model,'Usecontentsize',array('size'=>0,'maxlength'=>0)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Type'); ?>
		<?php echo $form->textField($model,'Type',array('size'=>0,'maxlength'=>0)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Meta'); ?>
		<?php echo $form->textArea($model,'Meta',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Url'); ?>
		<?php echo $form->textField($model,'Url',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Ath'); ?>
		<?php echo $form->textField($model,'Ath'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Atv'); ?>
		<?php echo $form->textField($model,'Atv'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Onover'); ?>
		<?php echo $form->textField($model,'Onover',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Onout'); ?>
		<?php echo $form->textField($model,'Onout',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Onclick'); ?>
		<?php echo $form->textField($model,'Onclick',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Crop'); ?>
		<?php echo $form->textField($model,'Crop',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Onovercrop'); ?>
		<?php echo $form->textField($model,'Onovercrop',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Ondowncrop'); ?>
		<?php echo $form->textField($model,'Ondowncrop',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Scalechildren'); ?>
		<?php echo $form->textField($model,'Scalechildren',array('size'=>0,'maxlength'=>0)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Mask'); ?>
		<?php echo $form->textField($model,'Mask',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Effect'); ?>
		<?php echo $form->textField($model,'Effect',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Onhover'); ?>
		<?php echo $form->textField($model,'Onhover',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Ondown'); ?>
		<?php echo $form->textField($model,'Ondown',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Onup'); ?>
		<?php echo $form->textField($model,'Onup',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Onloaded'); ?>
		<?php echo $form->textField($model,'Onloaded',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Altonloaded'); ?>
		<?php echo $form->textField($model,'Altonloaded',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Handcursor'); ?>
		<?php echo $form->textField($model,'Handcursor',array('size'=>0,'maxlength'=>0)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Style'); ?>
		<?php echo $form->textField($model,'Style',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Effects'); ?>
		<?php echo $form->textArea($model,'Effects',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->