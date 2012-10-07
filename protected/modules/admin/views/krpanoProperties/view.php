<?php
$this->breadcrumbs=array(
	'Krpano Properties'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List KrpanoProperties', 'url'=>array('index')),
	array('label'=>'Create KrpanoProperties', 'url'=>array('create')),
	array('label'=>'Update KrpanoProperties', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete KrpanoProperties', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage KrpanoProperties', 'url'=>array('admin')),
);
?>

<h1>View KrpanoProperties #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'category',
		'property',
		'description',
		'example',
		'input_type',
		'input_options',
		'read_only',
		'type',
		'min',
		'max',
		'step',
		'default',
		'ipad_compatible',
	),
)); ?>
