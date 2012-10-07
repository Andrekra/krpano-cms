<?php
$this->breadcrumbs=array(
	'Locations'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Locations', 'url'=>array('index')),
	array('label'=>'Create Locations', 'url'=>array('create')),
	array('label'=>'Update Locations', 'url'=>array('update', 'id'=>$model->LocationId)),
	array('label'=>'Delete Locations', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->LocationId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Locations', 'url'=>array('admin')),
);
?>

<h1>View Locations #<?php echo $model->LocationId; ?></h1>


