<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	GxHtml::valueEx($model),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Update') . ' ' . $model->label(), 'url'=>array('update', 'id' => $model->id)),
	array('label'=>Yii::t('app', 'Delete') . ' ' . $model->label(), 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'View') . ' ' . GxHtml::encode($model->label()) . ' ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
'id',
'name',
'description',
'keywords',
'default_location_id',
array(
			'name' => 'progress',
			'type' => 'raw',
			'value' => $model->progress !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->progress)), array('progresses/view', 'id' => GxActiveRecord::extractPkValue($model->progress, true))) : null,
			),
array(
			'name' => 'autorotate',
			'type' => 'raw',
			'value' => $model->autorotate !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->autorotate)), array('autorotates/view', 'id' => GxActiveRecord::extractPkValue($model->autorotate, true))) : null,
			),
array(
			'name' => 'control',
			'type' => 'raw',
			'value' => $model->control !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->control)), array('controls/view', 'id' => GxActiveRecord::extractPkValue($model->control, true))) : null,
			),
array(
			'name' => 'display',
			'type' => 'raw',
			'value' => $model->display !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->display)), array('displays/view', 'id' => GxActiveRecord::extractPkValue($model->display, true))) : null,
			),
array(
			'name' => 'memory',
			'type' => 'raw',
			'value' => $model->memory !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->memory)), array('memories/view', 'id' => GxActiveRecord::extractPkValue($model->memory, true))) : null,
			),
array(
			'name' => 'network',
			'type' => 'raw',
			'value' => $model->network !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->network)), array('networks/view', 'id' => GxActiveRecord::extractPkValue($model->network, true))) : null,
			),
array(
			'name' => 'user',
			'type' => 'raw',
			'value' => $model->user !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->user)), array('users/view', 'id' => GxActiveRecord::extractPkValue($model->user, true))) : null,
			),
	),
)); ?>

<h2><?php echo GxHtml::encode($model->getRelationLabel('locations')); ?></h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->locations as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('locations/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?>