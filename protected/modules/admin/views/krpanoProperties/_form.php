<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'krpano-properties-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'category'); ?>
		<?php echo $form->textArea($model,'category',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'category'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'property'); ?>
		<?php echo $form->textField($model,'property',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'property'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'example'); ?>
		<?php echo $form->textArea($model,'example',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'example'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'input_type'); ?>
		<?php echo $form->textArea($model,'input_type',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'input_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'input_options'); ?>
		<?php echo $form->textField($model,'input_options',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'input_options'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'read_only'); ?>
		<?php echo $form->textField($model,'read_only'); ?>
		<?php echo $form->error($model,'read_only'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->textField($model,'type',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'min'); ?>
		<?php echo $form->textField($model,'min',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'min'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'max'); ?>
		<?php echo $form->textField($model,'max',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'max'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'step'); ?>
		<?php echo $form->textField($model,'step',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'step'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'default'); ?>
		<?php echo $form->textField($model,'default',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'default'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ipad_compatible'); ?>
		<?php echo $form->textField($model,'ipad_compatible'); ?>
		<?php echo $form->error($model,'ipad_compatible'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->