<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'LocationId'); ?>
		<?php echo $form->textField($model,'LocationId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Name'); ?>
		<?php echo $form->textArea($model,'Name',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ProjectId'); ?>
		<?php echo $form->textField($model,'ProjectId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Thumbnail'); ?>
		<?php echo $form->textField($model,'Thumbnail',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'krpano_image_id'); ?>
		<?php echo $form->textField($model,'krpano_image_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'krpano_preview_id'); ?>
		<?php echo $form->textField($model,'krpano_preview_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'krpano_view_id'); ?>
		<?php echo $form->textField($model,'krpano_view_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->