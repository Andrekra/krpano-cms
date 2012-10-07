<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'id'); ?>
		<?php echo $form->textField($model, 'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'name'); ?>
		<?php echo $form->textField($model, 'name', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'description'); ?>
		<?php echo $form->textArea($model, 'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'keywords'); ?>
		<?php echo $form->textArea($model, 'keywords'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'default_location_id'); ?>
		<?php echo $form->textField($model, 'default_location_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'progress_id'); ?>
		<?php echo $form->dropDownList($model, 'progress_id', GxHtml::listDataEx(Progresses::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'autorotate_id'); ?>
		<?php echo $form->dropDownList($model, 'autorotate_id', GxHtml::listDataEx(Autorotates::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'control_id'); ?>
		<?php echo $form->dropDownList($model, 'control_id', GxHtml::listDataEx(Controls::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'display_id'); ?>
		<?php echo $form->dropDownList($model, 'display_id', GxHtml::listDataEx(Displays::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'memory_id'); ?>
		<?php echo $form->dropDownList($model, 'memory_id', GxHtml::listDataEx(Memories::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'network_id'); ?>
		<?php echo $form->dropDownList($model, 'network_id', GxHtml::listDataEx(Networks::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'user_id'); ?>
		<?php echo $form->dropDownList($model, 'user_id', GxHtml::listDataEx(Users::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
