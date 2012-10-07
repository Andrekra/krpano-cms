<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'projects-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model, 'name', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'name'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model, 'description'); ?>
		<?php echo $form->error($model,'description'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'keywords'); ?>
		<?php echo $form->textArea($model, 'keywords'); ?>
		<?php echo $form->error($model,'keywords'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'default_location_id'); ?>
		<?php echo $form->textField($model, 'default_location_id'); ?>
		<?php echo $form->error($model,'default_location_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'progress_id'); ?>
		<?php echo $form->dropDownList($model, 'progress_id', GxHtml::listDataEx(Progresses::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'progress_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'autorotate_id'); ?>
		<?php echo $form->dropDownList($model, 'autorotate_id', GxHtml::listDataEx(Autorotates::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'autorotate_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'control_id'); ?>
		<?php echo $form->dropDownList($model, 'control_id', GxHtml::listDataEx(Controls::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'control_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'display_id'); ?>
		<?php echo $form->dropDownList($model, 'display_id', GxHtml::listDataEx(Displays::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'display_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'memory_id'); ?>
		<?php echo $form->dropDownList($model, 'memory_id', GxHtml::listDataEx(Memories::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'memory_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'network_id'); ?>
		<?php echo $form->dropDownList($model, 'network_id', GxHtml::listDataEx(Networks::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'network_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->dropDownList($model, 'user_id', GxHtml::listDataEx(Users::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'user_id'); ?>
		</div><!-- row -->

		<label><?php echo GxHtml::encode($model->getRelationLabel('locations')); ?></label>
		<?php echo $form->checkBoxList($model, 'locations', GxHtml::encodeEx(GxHtml::listDataEx(Locations::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->