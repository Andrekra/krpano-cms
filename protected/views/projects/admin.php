<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	Yii::t('app', 'Manage'),
);

$this->menu = array(
		array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
		array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
	);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('projects-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('app', 'Manage') . ' ' . GxHtml::encode($model->label(2)); ?></h1>

<p>
You may optionally enter a comparison operator (&lt;, &lt;=, &gt;, &gt;=, &lt;&gt; or =) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo GxHtml::link(Yii::t('app', 'Advanced Search'), '#', array('class' => 'search-button')); ?>
<div class="search-form">
<?php $this->renderPartial('_search', array(
	'model' => $model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'projects-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
		'id',
		'name',
		'description',
		'keywords',
		'default_location_id',
		array(
				'name'=>'progress_id',
				'value'=>'GxHtml::valueEx($data->progress)',
				'filter'=>GxHtml::listDataEx(Progresses::model()->findAllAttributes(null, true)),
				),
		/*
		array(
				'name'=>'autorotate_id',
				'value'=>'GxHtml::valueEx($data->autorotate)',
				'filter'=>GxHtml::listDataEx(Autorotates::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'control_id',
				'value'=>'GxHtml::valueEx($data->control)',
				'filter'=>GxHtml::listDataEx(Controls::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'display_id',
				'value'=>'GxHtml::valueEx($data->display)',
				'filter'=>GxHtml::listDataEx(Displays::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'memory_id',
				'value'=>'GxHtml::valueEx($data->memory)',
				'filter'=>GxHtml::listDataEx(Memories::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'network_id',
				'value'=>'GxHtml::valueEx($data->network)',
				'filter'=>GxHtml::listDataEx(Networks::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'user_id',
				'value'=>'GxHtml::valueEx($data->user)',
				'filter'=>GxHtml::listDataEx(Users::model()->findAllAttributes(null, true)),
				),
		*/
		array(
			'class' => 'CButtonColumn',
		),
	),
)); ?>