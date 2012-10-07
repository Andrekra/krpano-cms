<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'hotspots-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'LocationId'); ?>
		<?php echo $form->textField($model,'LocationId'); ?>
		<?php echo $form->error($model,'LocationId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Name'); ?>
		<?php echo $form->textField($model,'Name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'Name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Alturl'); ?>
		<?php echo $form->textField($model,'Alturl',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'Alturl'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Keep'); ?>
		<?php echo $form->textField($model,'Keep',array('size'=>0,'maxlength'=>0)); ?>
		<?php echo $form->error($model,'Keep'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Devices'); ?>
		<?php echo $form->textField($model,'Devices',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'Devices'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Visible'); ?>
		<?php echo $form->textField($model,'Visible',array('size'=>0,'maxlength'=>0)); ?>
		<?php echo $form->error($model,'Visible'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Enabled'); ?>
		<?php echo $form->textField($model,'Enabled',array('size'=>0,'maxlength'=>0)); ?>
		<?php echo $form->error($model,'Enabled'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Scale9grid'); ?>
		<?php echo $form->textField($model,'Scale9grid',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'Scale9grid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Zorder'); ?>
		<?php echo $form->textField($model,'Zorder'); ?>
		<?php echo $form->error($model,'Zorder'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Capture'); ?>
		<?php echo $form->textField($model,'Capture',array('size'=>0,'maxlength'=>0)); ?>
		<?php echo $form->error($model,'Capture'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Children'); ?>
		<?php echo $form->textField($model,'Children',array('size'=>0,'maxlength'=>0)); ?>
		<?php echo $form->error($model,'Children'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Preload'); ?>
		<?php echo $form->textField($model,'Preload',array('size'=>0,'maxlength'=>0)); ?>
		<?php echo $form->error($model,'Preload'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Blendmode'); ?>
		<?php echo $form->textField($model,'Blendmode',array('size'=>0,'maxlength'=>0)); ?>
		<?php echo $form->error($model,'Blendmode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Edge'); ?>
		<?php echo $form->textField($model,'Edge',array('size'=>0,'maxlength'=>0)); ?>
		<?php echo $form->error($model,'Edge'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Ox'); ?>
		<?php echo $form->textField($model,'Ox',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'Ox'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Oy'); ?>
		<?php echo $form->textField($model,'Oy',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'Oy'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Zoom'); ?>
		<?php echo $form->textField($model,'Zoom',array('size'=>0,'maxlength'=>0)); ?>
		<?php echo $form->error($model,'Zoom'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Distorted'); ?>
		<?php echo $form->textField($model,'Distorted',array('size'=>0,'maxlength'=>0)); ?>
		<?php echo $form->error($model,'Distorted'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Rx'); ?>
		<?php echo $form->textField($model,'Rx'); ?>
		<?php echo $form->error($model,'Rx'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Ry'); ?>
		<?php echo $form->textField($model,'Ry'); ?>
		<?php echo $form->error($model,'Ry'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Rz'); ?>
		<?php echo $form->textField($model,'Rz'); ?>
		<?php echo $form->error($model,'Rz'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Inverserotation'); ?>
		<?php echo $form->textField($model,'Inverserotation',array('size'=>0,'maxlength'=>0)); ?>
		<?php echo $form->error($model,'Inverserotation'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Flying'); ?>
		<?php echo $form->textField($model,'Flying'); ?>
		<?php echo $form->error($model,'Flying'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Width'); ?>
		<?php echo $form->textField($model,'Width',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'Width'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Height'); ?>
		<?php echo $form->textField($model,'Height',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'Height'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Scale'); ?>
		<?php echo $form->textField($model,'Scale'); ?>
		<?php echo $form->error($model,'Scale'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Altscale'); ?>
		<?php echo $form->textField($model,'Altscale'); ?>
		<?php echo $form->error($model,'Altscale'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Rotate'); ?>
		<?php echo $form->textField($model,'Rotate'); ?>
		<?php echo $form->error($model,'Rotate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Smoothing'); ?>
		<?php echo $form->textField($model,'Smoothing',array('size'=>0,'maxlength'=>0)); ?>
		<?php echo $form->error($model,'Smoothing'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Accuracy'); ?>
		<?php echo $form->textField($model,'Accuracy',array('size'=>0,'maxlength'=>0)); ?>
		<?php echo $form->error($model,'Accuracy'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Alpha'); ?>
		<?php echo $form->textField($model,'Alpha'); ?>
		<?php echo $form->error($model,'Alpha'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Usecontentsize'); ?>
		<?php echo $form->textField($model,'Usecontentsize',array('size'=>0,'maxlength'=>0)); ?>
		<?php echo $form->error($model,'Usecontentsize'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Type'); ?>
		<?php echo $form->textField($model,'Type',array('size'=>0,'maxlength'=>0)); ?>
		<?php echo $form->error($model,'Type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Meta'); ?>
		<?php echo $form->textArea($model,'Meta',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'Meta'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Url'); ?>
		<?php echo $form->textField($model,'Url',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'Url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Ath'); ?>
		<?php echo $form->textField($model,'Ath'); ?>
		<?php echo $form->error($model,'Ath'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Atv'); ?>
		<?php echo $form->textField($model,'Atv'); ?>
		<?php echo $form->error($model,'Atv'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Onover'); ?>
		<?php echo $form->textField($model,'Onover',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'Onover'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Onout'); ?>
		<?php echo $form->textField($model,'Onout',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'Onout'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Onclick'); ?>
		<?php echo $form->textField($model,'Onclick',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'Onclick'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Crop'); ?>
		<?php echo $form->textField($model,'Crop',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'Crop'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Onovercrop'); ?>
		<?php echo $form->textField($model,'Onovercrop',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'Onovercrop'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Ondowncrop'); ?>
		<?php echo $form->textField($model,'Ondowncrop',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'Ondowncrop'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Scalechildren'); ?>
		<?php echo $form->textField($model,'Scalechildren',array('size'=>0,'maxlength'=>0)); ?>
		<?php echo $form->error($model,'Scalechildren'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Mask'); ?>
		<?php echo $form->textField($model,'Mask',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'Mask'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Effect'); ?>
		<?php echo $form->textField($model,'Effect',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'Effect'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Onhover'); ?>
		<?php echo $form->textField($model,'Onhover',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'Onhover'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Ondown'); ?>
		<?php echo $form->textField($model,'Ondown',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'Ondown'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Onup'); ?>
		<?php echo $form->textField($model,'Onup',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'Onup'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Onloaded'); ?>
		<?php echo $form->textField($model,'Onloaded',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'Onloaded'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Altonloaded'); ?>
		<?php echo $form->textField($model,'Altonloaded',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'Altonloaded'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Handcursor'); ?>
		<?php echo $form->textField($model,'Handcursor',array('size'=>0,'maxlength'=>0)); ?>
		<?php echo $form->error($model,'Handcursor'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Style'); ?>
		<?php echo $form->textField($model,'Style',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'Style'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Effects'); ?>
		<?php echo $form->textArea($model,'Effects',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'Effects'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->