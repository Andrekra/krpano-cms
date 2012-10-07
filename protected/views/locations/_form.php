<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'locations-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Name'); ?>
		<?php echo $form->textArea($model,'Name',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'Name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ProjectId'); ?>
		<?php echo $form->textField($model,'ProjectId'); ?>
		<?php echo $form->error($model,'ProjectId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Thumbnail'); ?>
		<?php echo $form->textField($model,'Thumbnail',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'Thumbnail'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'krpano_image_id'); ?>
		<?php echo $form->textField($model,'krpano_image_id'); ?>
		<?php echo $form->error($model,'krpano_image_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'krpano_preview_id'); ?>
		<?php echo $form->textField($model,'krpano_preview_id'); ?>
		<?php echo $form->error($model,'krpano_preview_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'krpano_view_id'); ?>
		<?php echo $form->textField($model,'krpano_view_id'); ?>
		<?php echo $form->error($model,'krpano_view_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->